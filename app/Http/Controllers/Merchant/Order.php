<?php
namespace App\Http\Controllers\Merchant; use App\Http\Controllers\Shop\ApiPay; use App\Library\CurlRequest; use App\Library\FundHelper; use App\Library\Helper; use App\Library\Response; use App\Mail\OrderShipped; use App\System; use Carbon\Carbon; use Illuminate\Database\Eloquent\Relations\Relation; use Illuminate\Http\Request; use App\Http\Controllers\Controller; use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Mail; class Order extends Controller { function get(Request $sp0fc69c) { $sp3f78ce = $this->authQuery($sp0fc69c, \App\Order::class); $sp3c5594 = (int) $sp0fc69c->post('category_id'); $spedd229 = (int) $sp0fc69c->post('product_id'); $sp891155 = (int) $sp0fc69c->post('profit'); $sp64bc89 = $sp3c5594 === \App\Product::ID_API || $spedd229 === \App\Product::ID_API; $sp5c7997 = $sp0fc69c->post('search', false); $sp5f3104 = $sp0fc69c->post('val', false); if ($sp5c7997 && $sp5f3104) { if ($sp5c7997 == 'id' || $sp5c7997 == 'order_no' || $sp5c7997 === 'pay_trade_no' || $sp5c7997 === 'api_out_no') { $sp3f78ce->where($sp5c7997, $sp5f3104); } else { $sp3f78ce->where($sp5c7997, 'like', '%' . $sp5f3104 . '%'); } } if ($sp3c5594 > 0) { if ($spedd229 > 0) { $sp3f78ce->where('product_id', $spedd229); } else { $sp3f78ce->whereHas('product', function ($sp3f78ce) use($sp3c5594) { $sp3f78ce->where('category_id', $sp3c5594); }); } } $spf3be9b = (int) $sp0fc69c->post('recent', 0); if ($spf3be9b) { $sp5bc242 = (new Carbon())->addDay(-$spf3be9b); $sp3f78ce->where('paid_at', '>=', $sp5bc242); } else { $sp5bc242 = $sp0fc69c->post('start_at', false); if (strlen($sp5bc242)) { $sp3f78ce->where('paid_at', '>=', $sp5bc242 . ' 00:00:00'); } $spce0aa4 = $sp0fc69c->post('end_at', false); if (strlen($spce0aa4)) { $sp3f78ce->where('paid_at', '<=', $spce0aa4 . ' 23:59:59'); } } if ($sp891155) { $sp3f78ce->where('status', \App\Order::STATUS_SUCCESS); $spd864a6 = clone $sp3f78ce; $sp8a1a33 = $spd864a6->selectRaw('SUM(`income`) as income, SUM(`income`-`cost`) as profit')->first(); } else { $sp1a65a5 = $sp0fc69c->post('status'); if (strlen($sp1a65a5)) { $sp3f78ce->whereIn('status', explode(',', $sp1a65a5)); } else { $sp3f78ce->where('status', '!=', \App\Order::STATUS_UNPAY); } if ($sp64bc89) { $sp3f78ce->where('product_id', \App\Product::ID_API); } else { $sp3f78ce->where('product_id', '>', 0); $sp3f78ce->with(array('product' => function (Relation $sp3f78ce) { $sp3f78ce->select(array('id', 'name')); }, 'card_orders.card' => function (Relation $sp3f78ce) { $sp3f78ce->select(array('id', 'card')); })); } } $sp3f78ce->with(array('pay' => function (Relation $sp3f78ce) { $sp3f78ce->select(array('id', 'name')); })); $sp73a73e = $sp0fc69c->post('current_page', 1); $spfc5387 = $sp0fc69c->post('per_page', 20); $sp36eb9c = $sp3f78ce->orderBy('id', 'DESC')->paginate($spfc5387, array('*'), 'page', $sp73a73e); if (!$this->isAdmin()) { foreach ($sp36eb9c->items() as $sp7fd294) { $sp7fd294->addHidden(array('system_fee')); } } if ($sp891155) { $sp36eb9c = $sp36eb9c->toArray(); $sp36eb9c['profit_sum'] = $sp8a1a33; } return Response::success($sp36eb9c); } function stat(Request $sp0fc69c) { $sp4cd8b1 = (int) $sp0fc69c->input('day', 7); $sp36eb9c = $this->authQuery($sp0fc69c, \App\Order::class)->where(function ($sp3f78ce) { $sp3f78ce->where('status', \App\Order::STATUS_PAID)->orWhere('status', \App\Order::STATUS_SUCCESS); })->where('paid_at', '>=', Helper::getMysqlDate(-$sp4cd8b1 + 1))->groupBy('date')->orderBy('date', 'DESC')->selectRaw('DATE(`paid_at`) as "date",COUNT(*) as "count",SUM(`income`) as "sum"')->get()->toArray(); $spc8aebe = array(); foreach ($sp36eb9c as $spf427c6) { $spc8aebe[$spf427c6['date']] = array((int) $spf427c6['count'], (int) $spf427c6['sum']); } return Response::success($spc8aebe); } function info(Request $sp0fc69c) { $spfc3b4d = (int) $sp0fc69c->post('id'); if (!$spfc3b4d) { return Response::forbidden(); } $sp7fd294 = $this->authQuery($sp0fc69c, \App\Order::class)->with(array('pay' => function (Relation $sp3f78ce) { $sp3f78ce->select(array('id', 'name')); }, 'card_orders.card' => function (Relation $sp3f78ce) { $sp3f78ce->select(array('id', 'card')); }))->findOrFail($spfc3b4d); $sp7fd294->addHidden(array('system_fee')); return Response::success($sp7fd294); } function remark(Request $sp0fc69c) { $spfc3b4d = (int) $sp0fc69c->post('id'); if (!$spfc3b4d) { return Response::forbidden(); } $sp7fd294 = $this->authQuery($sp0fc69c, \App\Order::class)->findOrFail($spfc3b4d); $sp7fd294->remark = $sp0fc69c->post('remark'); $sp7fd294->save(); return Response::success(); } function ship(Request $sp0fc69c) { $this->validate($sp0fc69c, array('id' => 'required|integer')); $sp7fd294 = $this->authQuery($sp0fc69c, \App\Order::class)->findOrFail($sp0fc69c->post('id')); if ($sp7fd294->status !== \App\Order::STATUS_PAID) { return Response::fail('订单不是待发货状态, 无法发货'); } $sp131eeb = null; if (FundHelper::orderSuccess($sp7fd294, function () use(&$sp7fd294, &$sp131eeb) { $sp7fd294 = \App\Order::where('id', $sp7fd294->id)->lockForUpdate()->firstOrFail(); if ($sp7fd294->cards && count($sp7fd294->cards)) { $sp131eeb = '该订单已经发货，无需再次发货'; return false; } $spdaad30 = \App\Card::where('product_id', $sp7fd294->product_id)->whereRaw('`count_sold`<`count_all`')->take($sp7fd294->count)->lockForUpdate()->get(); if (count($spdaad30) !== $sp7fd294->count) { $sp131eeb = '商品卡密不足, 请添加卡密后再发货'; return false; } else { $sp7fd294->status = \App\Order::STATUS_SUCCESS; $sp7fd294->saveOrFail(); $spb08013 = array(); $sp406240 = ''; $sp6b4851 = array(); foreach ($spdaad30 as $sp0c5ad3) { $sp406240 .= $sp0c5ad3->card . '<br>'; $spb08013[] = $sp0c5ad3->id; $sp6b4851[] = array('card' => $sp0c5ad3->card); } $sp7fd294->cards()->attach($spb08013); \App\Card::whereIn('id', $spb08013)->update(array('status' => \App\Card::STATUS_SOLD, 'count_sold' => DB::raw('`count_sold`+1'))); try { \Mail::to($sp7fd294->email)->Queue(new OrderShipped($sp7fd294, $sp406240)); $sp7fd294->email_sent = true; $sp7fd294->saveOrFail(); } catch (\Exception $sp2a4a9a) { \App\Library\LogHelper::setLogFile('mail'); \Log::error('Order.ship error, order_no:' . $sp7fd294->order_no . ', email:' . $sp7fd294->email . ', cards:' . $sp406240 . ', Exception:' . $sp2a4a9a->getMessage()); \App\Library\LogHelper::setLogFile('card'); } $sp7fd294->addHidden(array('system_fee')); $sp7fd294 = $sp7fd294->toArray(); $sp7fd294['cards'] = $sp6b4851; return \App\Order::STATUS_SUCCESS; } })) { if (!$sp131eeb) { return Response::success($sp7fd294->toArray()); } else { return Response::fail($sp131eeb ? $sp131eeb : '未知错误'); } } else { \Log::error('Order.ship error, order_no:' . $sp7fd294->order_no); return Response::fail($sp131eeb ? $sp131eeb : '数据库繁忙, 请联系客服'); } } }
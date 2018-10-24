<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateOrdersTable extends Migration { public function up() { Schema::create('orders', function (Blueprint $sp3881f9) { $sp3881f9->increments('id'); $sp3881f9->integer('user_id'); $sp3881f9->string('order_no', 128); $sp3881f9->integer('product_id'); $sp3881f9->integer('count'); $sp3881f9->string('email')->nullable(); $sp3881f9->string('ip')->nullable(); $sp3881f9->string('customer', 32)->nullable(); $sp3881f9->boolean('email_sent')->default(false); $sp3881f9->string('remark')->nullable(); $sp3881f9->integer('cost')->default(0); $sp3881f9->integer('price')->default(0); $sp3881f9->integer('discount')->default(0); $sp3881f9->integer('paid')->default(0); $sp3881f9->integer('fee')->default(0); $sp3881f9->integer('system_fee')->default(0); $sp3881f9->integer('income')->default(0); $sp3881f9->integer('pay_id'); $sp3881f9->string('pay_trade_no')->nullable(); $sp3881f9->integer('status')->default(\App\Order::STATUS_UNPAY); $sp3881f9->string('frozen_reason')->nullable(); $sp3881f9->string('api_out_no', 128)->nullable(); $sp3881f9->text('api_info')->nullable(); $sp3881f9->dateTime('paid_at')->nullable(); $sp3881f9->timestamps(); $sp3881f9->index(array('user_id', 'order_no')); }); } public function down() { Schema::dropIfExists('orders'); } }
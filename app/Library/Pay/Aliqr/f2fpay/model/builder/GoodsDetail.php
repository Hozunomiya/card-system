<?php
class GoodsDetail { private $goodsId; private $alipayGoodsId; private $goodsName; private $quantity; private $price; private $goodsCategory; private $body; private $goodsDetail = array(); public function getGoodsDetail() { return $this->goodsDetail; } public function setGoodsId($spa19793) { $this->goodsId = $spa19793; $this->goodsDetail['goods_id'] = $spa19793; } public function getGoodsId() { return $this->goodsId; } public function setAlipayGoodsId($spa7f93c) { $this->alipayGoodsId = $spa7f93c; $this->goodsDetail['alipay_goods_id'] = $spa7f93c; } public function getAlipayGoodsId() { return $this->alipayGoodsId; } public function setGoodsName($spf35cfe) { $this->goodsName = $spf35cfe; $this->goodsDetail['goods_name'] = $spf35cfe; } public function getGoodsName() { return $this->goodsName; } public function setQuantity($sp5e8f73) { $this->quantity = $sp5e8f73; $this->goodsDetail['quantity'] = $sp5e8f73; } public function getQuantity() { return $this->quantity; } public function setPrice($spf6f2b2) { $this->price = $spf6f2b2; $this->goodsDetail['price'] = $spf6f2b2; } public function getPrice() { return $this->price; } public function setGoodsCategory($sp8d94db) { $this->goodsCategory = $sp8d94db; $this->goodsDetail['goods_category'] = $sp8d94db; } public function getGoodsCategory() { return $this->goodsCategory; } public function setBody($speb838e) { $this->body = $speb838e; $this->goodsDetail['body'] = $speb838e; } public function getBody() { return $this->body; } }
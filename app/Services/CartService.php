<?php

namespace App\Services;

class CartService{
  public static function getItemsInCart($items) {
    $products = []; //空の配列を準備

    dd($items);
    foreach($items as $item){
      // カート内の商品を一つずつ処理 略(次ページ)
    }
      return $products; // 新しい配列を返す
    }
}
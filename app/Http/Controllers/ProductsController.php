<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $products = Product::get();
        return response()->json($products);
    }

    public function postProducts(Request $req)
    {
        $products = new Product();

        $products->name=$req->name;
        $products->number=$req->number;
        $products->price=$req->price;


        $b=$products->save();

        if($b)
            return "Все акей";
           return"Не акей";
    }

      public function deleteProducts(Request $req)
      {
        $products = Product::where("name", $req->name)->first();
        $products->delete();
        return response()->json("Товар удален");
      }
}

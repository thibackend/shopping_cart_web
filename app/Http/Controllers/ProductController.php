<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
class ProductController extends Controller
{
    function index()
    {

        $pro = products::all();
        $categories = categories::find(7);
        $categories_pro =[];
        foreach ($pro as $key => $value) {
           $nameCategories = categories::find($value['category_id']);
           
            $newPro =[
                "id"=>$value["id"],
                'name'=>$value['name'],
                'image'=>$value['image'],
                'price'=>$value['price'],
                'category_id'=>$value['category_id'],
                'category'=>$nameCategories->name
            ];
           array_push($categories_pro,$newPro);
        }
        return view('trangchu',compact('categories_pro'));
    }
}
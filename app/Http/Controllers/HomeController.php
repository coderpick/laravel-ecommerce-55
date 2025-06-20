<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::select('id', 'slug', 'name', 'feature_image', 'category_id', 'price', 'discount', 'discount_price')
            ->with('category:id,name')
            ->limit(6)
            ->get();
        $data['brands'] = Brand::get();
        return view('frontend.index', $data);
    }
}

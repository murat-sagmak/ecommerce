<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class PageHomeController extends Controller
{
    public function index(){
              $slider = Slider::where('status','1')->first(); #get ile sarti saglayan verileri cekme
            $title = "Home";
        
        
        $about=About::where("id","1")->first();
        $featuredproducts =Product::where('status','1')->select(['id','name','slug','brand','price', 'category_id', 'image'])
        ->with('category')
        ->orderBy('id','desc')
        ->limit(3)
        ->get();
        return view('frontend.pages.index', compact('slider','title','about','featuredproducts'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function products(Request $request, $slug=null){

            $category = request()->segment(1) ?? null;
            $brands = $request->input('brand', []);
            $startPrice = $request->min ?? null;
            $endPrice = $request->max ?? null;
            $orderColumn = $request->input('order', 'id');
            $orderDirection = $request->input('sort', 'desc');

            $products =Product::where('status','1')->select(['id','name','slug','brand','price', 'category_id', 'image'])
            ->where(function($query) use($brands, $startPrice, $endPrice){
                if(!empty($brands)){

                    $query->whereIn('brand', $brands);

                }
                if (!is_null($startPrice) && !is_null($endPrice)) {
                    $query->where('price', '>=', $startPrice);
                    $query->where('price', '<=', $endPrice);

                }
                return $query;
            })
            ->with('category')
            ->whereHas('category', function($query) use ($category, $slug){

                if(!empty($slug)){
                    $query -> where('slug',$slug);
                }
                return $query;
                

            });
            $brandLists = Product::where('status','1')->groupBy('brand')->pluck('brand') ->toArray();

            $products = $products->orderBy($orderColumn, $orderDirection)->paginate(21);
            $maxprice = Product::max('price');
        return view('frontend.pages.products', compact('products', 'maxprice','brandLists'));

    }
    public function discountproducts(){
        return view("frontend.pages.products");

    }

    public function productdetails($slug){
         $product =Product::whereSlug($slug)->where('status','1')->firstOrFail();
         $products = Product::where('id','!=', $product->id)
         ->where('category_id', $product->category_id)
         ->where('status','1')
         ->limit(6)
         ->orderBy('id','desc')
         ->get();
        return view("frontend.pages.productdetails", compact('product','products'));
    }

    public function about(){
        $about = About::where('id',1)->first();
        return view("frontend.pages.about", compact("about"));

    }

    public function contact(){
        return view("frontend.pages.contact");
    }

    
    public function showSettings()
    {
        $settings = SiteSetting::pluck('data', 'name')->toArray();

        return view('frontend.inc.footer', compact('settings'));
    }
}

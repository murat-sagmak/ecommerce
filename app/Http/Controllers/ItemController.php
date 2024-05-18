<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::with('category:id,cat_up,name')->orderBy('id', 'desc')->get();
        return view("item.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view("item.edit", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/item/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

        }

        Product::create([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'status' => $request->status,
            'content' => $request->content,
            'price'=> $request->price,
            'text' => $request->text,
            'brand' => $request->brand,
            'amount' => $request->amount,
            'image' => $imageUrl ?? NULL,
        ]);
        return back()->with('success', 'Operation was successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::where("id", $id)->first();

        $categories = Category::get();
        return view("item.edit", compact('item',"categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, string $id)
    {
        $item = Product::where("id", $id)->firstOrFail();
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/item/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

            
        }
        $item->update([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'status' => $request->status,
            'content' => $request->content,
            'price'=> $request->price,
            'text' => $request->text,
            'brand' => $request->brand,
            'amount' => $request->amount,
            'image' => $imageUrl ?? $item->image,
        ]);
        return back()->with('success', 'Operation was successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Product::where('id', $id)->firstOrFail();

        if(file_exists($item->image)){
            $item->delete();
        }
       
        return back()->with('success', 'Operation was successful!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        return view("slider.index", compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("slider.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/slider/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

        }
        Slider::create([
            'name'=> $request->name,
            'link' => $request->link,
            'status' => $request->status,
            'content' => $request->content,
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
        $slider = Slider::where("id", $id)->first();
        return view("slider.edit", compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::where("id", $id)->first();
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $filename = time().'-'.Str::slug($request->name);
            
            $uploadFile = 'images/slider/';

            if($extension == 'pdf' || $extension == 'svg' || $extension == 'webp' || $extension == 'jiff'){
                $image ->move(public_path($uploadFile), $filename.'.'.$extension);

                $imageUrl = $uploadFile.$filename.'.'.$extension;
            }else{
                $image = Image::make($image);
                $image->encode('webp', 75)->save(public_path($uploadFile.$filename.'.webp'));
                $imageUrl = $uploadFile.$filename.'.webp';
            }

            
        }
        $slider->update([
            'name'=> $request->name,
            'link' => $request->link,
            'status' => $request->status,
            'content' => $request->content,
            'image' => $imageUrl ?? $slider->image,
        ]);
        return back()->with('success', 'Operation was successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider=Slider::where('id', $id)->firstOrFail();

        if(file_exists($slider->image)){
            if(!empty($slider->image)){
                unlink($slider->image);
            }
        }
        $slider->delete();
        return back()->with('success', 'Operation was successful!');
    }
}

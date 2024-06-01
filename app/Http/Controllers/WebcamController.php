<?php

namespace App\Http\Controllers;

use App\Models\Webcam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
//use Storage;

class WebcamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('webcam');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        dd('Image uploaded successfully: '.$fileName);
    }

    /**
     * Display the specified resource.
     */
    public function show(Webcam $webcam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Webcam $webcam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Webcam $webcam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Webcam $webcam)
    {
        //
    }
}

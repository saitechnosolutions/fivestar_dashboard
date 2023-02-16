<?php

namespace App\Http\Controllers;

use App\Models\Bannerimg;
use Illuminate\Http\Request;

class BannerimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Bannerimg::all();
        return view('pages.banner',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Bannerimg;

        $banner->heading = $request->heading;
        $banner->paragraph = $request->text;
        $banner->button_link = $request->link;

        if($request->hasfile('img_name'))
        {
            $file = $request->file('img_name');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);
            $banner->imgname = $filename;
        }

        $banner->save();
        return redirect('/banner')->with('success','Banner Image Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Bannerimg = Bannerimg::find($id);
        $Bannerimg -> delete();
        return redirect('/banner')->with('success','Banner Image Deleted Successfully');
    }
}

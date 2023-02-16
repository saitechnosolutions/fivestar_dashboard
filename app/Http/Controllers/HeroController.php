<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutheroimage = DB::table('hero_image')
        ->select('*')
        ->where('id','=','1')
        ->first();

        $aboutheroimage2 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','2')
        ->first();
        $aboutheroimage3 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','3')
        ->first();
        $aboutheroimage4 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','4')
        ->first();
        $aboutheroimage5 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','5')
        ->first();
        $aboutheroimage6 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','6')
        ->first();
        $aboutheroimage7 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','7')
        ->first();
        $aboutheroimage8 = DB::table('hero_image')
        ->select('*')
        ->where('id','=','8')
        ->first();

        return view('pages.heroimage',compact('aboutheroimage','aboutheroimage2','aboutheroimage3','aboutheroimage4','aboutheroimage5','aboutheroimage6','aboutheroimage7','aboutheroimage8'));
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
        //
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
        //
    }

    public function updateheroimage(Request $request){


        $id = $request->id;
        // dd($request->image);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $heroimg = $filename;
        }
        else
        {
            $heroimg = $request->oldheroimage;
        }


        $gallery= DB::table('hero_image')->where('id',$id)->update(array(
            'image_name' => $heroimg

        ));
    if($gallery)
    {
        return redirect('/heroimage')->with('success','Image Updated Successfully');
    }
    }
}

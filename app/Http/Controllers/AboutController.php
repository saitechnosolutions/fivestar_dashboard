<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('about_db')
        ->select('*')
        ->where('id','=',1)
        ->first();

        return view('pages.about',compact('about'));
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

    public function updateContent(Request $request)
    {
        $abtcontent = $request->abtcontent;
        $whychooseus = $request->whychooseus;
        $who_we_are = $request->who_we_are;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $heroimg = $filename;

            $abt= DB::table('about_db')->where('id',1)->update(array(
                'abt_img' => $heroimg

            ));

            return back()->with('success','Image updated');
        }


        if($abtcontent)
        {
            $abt= DB::table('about_db')->where('id',1)->update(array(
                'abt_content' => $abtcontent

            ));

            return back()->with('success','Content updated');
        }

        if($whychooseus)
        {
            $abt= DB::table('about_db')->where('id',1)->update(array(
                'why_choose_us' => $whychooseus

            ));

            return back()->with('success','Content updated');
        }

        if($who_we_are)
        {
            $abt= DB::table('about_db')->where('id',1)->update(array(
                'who_we_are' => $who_we_are

            ));

            return back()->with('success','Content updated');
        }

    }
}

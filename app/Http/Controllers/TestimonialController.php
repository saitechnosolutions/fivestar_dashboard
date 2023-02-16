<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')
        ->select('*')
        ->get();
        return view('pages.testimonials',compact('testimonials'));
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
        $testimonials = new Testimonials();

        $testimonials->Title = $request->input('name');
        $testimonials->video_link = $request->input('videolink');

        $testimonials->Description = $request->input('testidescription');
        $testimonials->category = $request->input('category');
        // $file = $request->file('image');
        // $extension = $file ->getClientOriginalExtension();
        // $filename = time().'.'.$extension;
        // $file->move('images/',$filename);

        // $testimonials ->Image = $filename;

        $testimonials->save();

        return redirect('/testimonials')->with('success','Testimonials Added Successfully');
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
        $testimonials = Testimonials::find($id);
        return view('pages.testimonialedit',compact('testimonials'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonials = Testimonials::find($id);
        $testimonials -> delete();
        return redirect('/testimonials')->with('success','Testimonials Deleted Successfully');
    }

    public function updatetestimonials(Request $request)
    {
        $id = $request->id;
        $category = $request->category;
        $name = $request->name;
        $videolink = $request->videolink;
        $testidescription = $request->testidescription;

        $examnotiedit= DB::table('testimonials')->where('id',$id)->update(array(
            'Title' => $name,
            'Description' => $testidescription,
            'video_link' => $videolink,
            'category' => $category,
        ));

        if($examnotiedit)
        {
            return back()->with('success','Testimonials Updated');
        }
    }
}

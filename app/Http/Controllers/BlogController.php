<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = DB::table('blogs')
        ->select('*')
        ->get();
        return view('pages.blog',compact('blog'));
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
        $blog = DB::table('blogs')
         ->select('*')
         ->where('id','=',$id)
         ->first();

        return view('pages.blogedit',compact('blog'));
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
        $event = DB::table('blogs')->where('id', $id)->delete();

        return redirect('/blog')->with('success','Blog Deleted Successfully');
    }

    public function saveblog(Request $request)
    {
        $name = $request->name;
        $todaydate = date('d');
        $month = date('M');

        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);

        //     $blog = $filename;
        // }
        $description = $request->description;

        $blog = DB::table('blogs')->insert(
            [
                'title' => $name,
                // 'image' => $blog,
                'description' => $description,
                'create_date' => $todaydate,
                'create_month' => $month
            ]);

            if($blog)
            {
                return redirect('/blog')->with('success','Blogs Added Successfully');
            }
    }

    public function blogupdate(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);

        //     $blog = $filename;
        // }
        // else
        // {
        //     $blog = $request->oldimage;
        // }
        $description = $request->description;

        $event= DB::table('blogs')->where('id',$id)->update(array(
                'title' => $name,
                // 'image' => $blog,
                'Description' => $description,
                ));

                return redirect('/blog')->with('success','Blogs Updated Successfully');
    }
}

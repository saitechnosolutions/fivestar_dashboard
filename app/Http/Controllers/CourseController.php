<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $course = DB::table('courses')
        ->select('*')
        ->get();
        return view('pages.course',compact('course'));
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

    public function savecourse(Request $request)
    {
        $name = $request->name;
        $coursecategory = $request->coursecategory;
        $editordata = $request->editordata;
        // $sub_heading = $request->subheading;
        $coursefee = $request->coursefee;
        $duration = $request->duration;
        $books = $request->books;
        $questions = $request->questions;
        $paperbasedexam = $request->paperbasedexam;
        $computerbasedtest = $request->computerbasedtest;
        $additionalmaterial = $request->additionalmaterial;
        $infrastructure = $request->infrastructure;
        $courseoffered = $request->courseoffered;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg = $filename;
        }
        else
        {
            $courseimg = '';
        }

        if($request->hasfile('image2'))
        {
            $file = $request->file('image2');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg2 = $filename;
        }
        else
        {
            $courseimg2 = '';
        }

        if($request->hasfile('image3'))
        {
            $file = $request->file('image3');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg3 = $filename;
        }
        else
        {
            $courseimg3 = '';
        }

        if($request->hasfile('image4'))
        {
            $file = $request->file('image4');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg4 = $filename;
        }
        else
        {
            $courseimg4 = '';
        }

        if($request->hasfile('image5'))
        {
            $file = $request->file('image5');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg5 = $filename;
        }
        else
        {
            $courseimg5 = '';
        }

        if($request->hasfile('image6'))
        {
            $file = $request->file('image6');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg6 = $filename;
        }
        else
        {
            $courseimg6 = '';
        }

        if($request->hasfile('image7'))
        {
            $file = $request->file('image7');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg7 = $filename;
        }
        else
        {
            $courseimg7 = '';
        }

        if($request->hasfile('image8'))
        {
            $file = $request->file('image8');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg8 = $filename;
        }
        else
        {
            $courseimg8 = '';
        }

        if($request->hasfile('image9'))
        {
            $file = $request->file('image9');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg9 = $filename;
        }
        else
        {
            $courseimg9 = '';
        }

        if($request->hasfile('image10'))
        {
            $file = $request->file('image10');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg10 = $filename;
        }
        else
        {
            $courseimg10 = '';
        }

        if($request->hasfile('brochure'))
        {
            $file = $request->file('brochure');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $brochure = $filename;
        }
        else
        {
            $brochure = '';
        }

        $course = DB::table('courses')->insert(
            [
                'course_name' => $name,
                'course_category' => $coursecategory,
                // 'sub_heading' => $sub_heading,
                'image' => $courseimg,
                'course_details' => $editordata,
                'coursefee' => $coursefee,
                'duration' => $duration,
                'books' => $books,
                'questions' => $questions,
                'paperbasedexam' => $paperbasedexam,
                'computerbasedtest' => $computerbasedtest,
                'additionalmaterial' => $additionalmaterial,
                'infrastructure' => $infrastructure,
                'image2' => $courseimg2,
                'image3' => $courseimg3,
                'image4' => $courseimg4,
                'image5' => $courseimg5,
                'image6' => $courseimg6,
                'image7' => $courseimg7,
                'image8' => $courseimg8,
                'image9' => $courseimg9,
                'image10' => $courseimg10,
                'course_offered' => $courseoffered,
                'brochure' => $brochure
            ]);
        if($course)
        {
            return back();
        }
    }


    public function courseedit(Request $request)
    {
        $id = $request->id;

        $course = DB::table('courses')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return view('pages.courseedit',compact('course'));
    }

    public function updatecourse(Request $request)
    {
        $name = $request->name;
        $coursecategory = $request->coursecategory;
        $editordata = $request->editordata;
        // $sub_heading = $request->subheading;
        $coursefee = $request->coursefee;
        $duration = $request->duration;
        $books = $request->books;
        $questions = $request->questions;
        $paperbasedexam = $request->paperbasedexam;
        $computerbasedtest = $request->computerbasedtest;
        $additionalmaterial = $request->additionalmaterial;
        $infrastructure = $request->infrastructure;
        $courseoffered = $request->courseoffered;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg = $filename;
        }
        else
        {
            $courseimg = $request->oldimage;
        }

        if($request->hasfile('image2'))
        {
            $file = $request->file('image2');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg2 = $filename;
        }
        else
        {
            $courseimg2 = $request->oldimage2;
        }

        if($request->hasfile('image3'))
        {
            $file = $request->file('image3');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg3 = $filename;
        }
        else
        {
            $courseimg3 = $request->oldimage3;
        }

        if($request->hasfile('image4'))
        {
            $file = $request->file('image4');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg4 = $filename;
        }
        else
        {
            $courseimg4 = $request->oldimage4;
        }

        if($request->hasfile('image5'))
        {
            $file = $request->file('image5');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg5 = $filename;
        }
        else
        {
            $courseimg5 = $request->oldimage5;
        }

        if($request->hasfile('image6'))
        {
            $file = $request->file('image6');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg6 = $filename;
        }
        else
        {
            $courseimg6 = $request->oldimage6;
        }

        if($request->hasfile('image7'))
        {
            $file = $request->file('image7');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg7 = $filename;
        }
        else
        {
            $courseimg7 = $request->oldimage7;
        }

        if($request->hasfile('image8'))
        {
            $file = $request->file('image8');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg8 = $filename;
        }
        else
        {
            $courseimg8 = $request->oldimage8;
        }

        if($request->hasfile('image9'))
        {
            $file = $request->file('image9');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg9 = $filename;
        }
        else
        {
            $courseimg9 = $request->oldimage9;
        }

        if($request->hasfile('image10'))
        {
            $file = $request->file('image10');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $courseimg10 = $filename;
        }
        else
        {
            $courseimg10 = $request->oldimage10;
        }

        if($request->hasfile('brochure'))
        {
            $file = $request->file('brochure');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $brochure = $filename;
        }
        else
        {
            $brochure = $request->oldbrochure;
        }




        $id = $request->id;

        $courseedit= DB::table('courses')->where('id',$id)->update(array(
            'course_name' => $name,
                'course_category' => $coursecategory,
                // 'sub_heading' => $sub_heading,
                'image' => $courseimg,
                'course_details' => $editordata,
                'coursefee' => $coursefee,
                'duration' => $duration,
                'books' => $books,
                'questions' => $questions,
                'paperbasedexam' => $paperbasedexam,
                'computerbasedtest' => $computerbasedtest,
                'additionalmaterial' => $additionalmaterial,
                'infrastructure' => $infrastructure,
                'image2' => $courseimg2,
                'image3' => $courseimg3,
                'image4' => $courseimg4,
                'image5' => $courseimg5,
                'image6' => $courseimg6,
                'image7' => $courseimg7,
                'image8' => $courseimg8,
                'image9' => $courseimg9,
                'image10' => $courseimg10,
                'course_offered' => $courseoffered,
                'brochure' => $brochure
        ));

        if($courseedit)
        {
            return back()->with('success','Course Updated');
        }
    }

    public function coursedelete(Request $request)
    {
        $id = $request->id;

        $delete = DB::table('courses')
        ->select('*')
        ->where('id','=',$id)
        ->delete();

        if($delete)
        {
            return back()->with('success','Data Deleted Successfully');
        }
    }
}

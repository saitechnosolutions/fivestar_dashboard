<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamNotificationController extends Controller
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

        $notification = DB::table('exam_notifications')
        ->select('*')
        ->get();

        return view('pages.exam-notification',compact('course','notification'));
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

    public function savemachine(Request $request)
    {
        $course = $request->course;
        $examname = $request->examname;
        $registerstartdate = $request->registerstartdate;
        $registerenddate = $request->registerenddate;
        $entranceposition = $request->entranceposition;
        $examdate = $request->examdate;
        $websitelink = $request->websitelink;
        $phase = $request->phase;

        if($request->hasfile('notificationpdf'))
        {
            $file1 = $request->file('notificationpdf');
            $extension1 = $file1 ->getClientOriginalExtension();
            $filename1= "notificationpdf".time().'.'.$extension1;
            $file1->move('images/backend_images/',$filename1);

            $pdf = $filename1;
        }
        else
        {
            $pdf = '';
        }

        $examnotification = DB::table('exam_notifications')->insert(
            [
                'exam_name' => $examname,
                'r_start_date' => $registerstartdate,
                'r_end_date' => $registerenddate,
                'e_position' => $entranceposition,
                'exam_date' => $examdate,
                'notification_pdf' => $pdf,
                'website' => $websitelink,
                'course_name' =>$course,
                'phase' => $phase
            ]);

            if($examnotification)
            {
                return back();
            }
    }

    public function notificationedit(Request $request)
    {
        $id = $request->id;

        $examedit = DB::table('exam_notifications')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return view('pages.notificationedit',compact('examedit'));
    }

    public function updatenotification(Request $request)
    {
        $id = $request->id;
        $course = $request->course;
        $examname = $request->examname;
        $registerstartdate = $request->registerstartdate;
        $registerenddate = $request->registerenddate;
        $entranceposition = $request->entranceposition;
        $examdate = $request->examdate;
        $websitelink = $request->websitelink;

        if($request->hasfile('notificationpdf'))
        {
            $file1 = $request->file('notificationpdf');
            $extension1 = $file1 ->getClientOriginalExtension();
            $filename1= "notificationpdf".time().'.'.$extension1;
            $file1->move('images/backend_images/',$filename1);

            $pdf = $filename1;
        }
        else
        {
            $pdf = $request->oldnotification;
        }

        $examnotiedit= DB::table('exam_notifications')->where('id',$id)->update(array(
            'exam_name' => $examname,
            'r_start_date' => $registerstartdate,
            'r_end_date' => $registerenddate,
            'e_position' => $entranceposition,
            'exam_date' => $examdate,
            'notification_pdf' => $pdf,
            'website' => $websitelink,
            'course_name' =>$course
        ));


            return back()->with('success','Exam Notification Updated');

    }

    public function examdelete(Request $request)
    {
        $id = $request->id;

        $delete = DB::table('exam_notifications')
        ->select('*')
        ->where('id','=',$id)
        ->delete();

        if($delete)
        {
            return back()->with('success','Data Deleted Successfully');
        }
    }
}


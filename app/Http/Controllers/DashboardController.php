<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\register;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function totalProfiles()
    {
        $courses = DB::table('courses')
        ->select('*')
        ->count();

        $bannerimgs = DB::table('bannerimgs')
        ->select('*')
        ->count();

        $examnotification = DB::table('exam_notifications')
        ->select('*')
        ->count();

        $testimonials = DB::table('testimonials')
        ->select('*')
        ->count();

        $blogs = DB::table('blogs')
        ->select('*')
        ->count();

        $events = DB::table('events')
        ->select('*')
        ->count();

              return view('pages.dashboard',compact('courses','bannerimgs','examnotification','testimonials','blogs','events'));
    }


}

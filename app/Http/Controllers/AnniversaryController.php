<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnniversaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anniversary_logo = DB::table('anniversary_logo')
        ->select('*')
        ->where('id','=',1)
        ->first();
        return view('pages.anniversarylogo',compact('anniversary_logo'));
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
    public function anniversarysubmit(Request $request)
    {

        if($request->hasfile('img_name'))
        {
            $file1 = $request->file('img_name');
            $extension1 = $file1 ->getClientOriginalExtension();
            $filename1= "machine_".time().'.'.$extension1;
            $file1->move('images/backend_images/',$filename1);

            $image = $filename1;
        }


        $updatelogo= DB::table('anniversary_logo')->where('id',1)->update(array(
            'logo'=>$image,
        ));

        if($updatelogo)
        {
            return redirect('/anniversarylogo')->with('success','Gallery Added Successfully');
        }
        else
        {

        }
    }
}

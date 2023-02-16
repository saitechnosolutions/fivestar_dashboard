<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event1;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = DB::table('events')
            ->select('*')
            ->get();
        return view('pages.events', compact('event'));
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
        //  $event = Event1::find($id);
        $event = DB::table('events')
            ->select('*')
            ->where('id', '=', $id)
            ->first();

        return view('pages.eventedit', compact('event'));
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
        $event = DB::table('events')->where('id', $id)->delete();

        return redirect('/events')->with('success', 'Event Deleted Successfully');
    }

    public function saveEvent(Request $request)
    {
        $name = $request->name;
        $todaydate = date('d');
        $month = date('M');
        $description = $request->description;
        // $imagesCollection = [];
        // $images  = $request->file("image");

        if($request->hasfile('image1'))
        {
            $file = $request->file('image1');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);
            $image1 = $filename;
        }

        // if($request->hasfile('image2'))
        // {
        //     $file = $request->file('image2');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image2 = $filename;
        // }

        // if($request->hasfile('image3'))
        // {
        //     $file = $request->file('image3');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image3 = $filename;
        // }

        // if($request->hasfile('image4'))
        // {
        //     $file = $request->file('image4');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image4 = $filename;
        // }

        // if($request->hasfile('image5'))
        // {
        //     $file = $request->file('image5');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image5 = $filename;
        // }

        // if($request->hasfile('image6'))
        // {
        //     $file = $request->file('image6');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image6 = $filename;
        // }

        // if($request->hasfile('image7'))
        // {
        //     $file = $request->file('image7');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image7 = $filename;
        // }

        // if($request->hasfile('image8'))
        // {
        //     $file = $request->file('image8');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image8 = $filename;
        // }

        // if($request->hasfile('image9'))
        // {
        //     $file = $request->file('image9');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image9 = $filename;
        // }

        // if($request->hasfile('image10'))
        // {
        //     $file = $request->file('image10');
        //     $extension = $file ->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/backend_images/',$filename);
        //     $image10 = $filename;
        // }

            DB::table('events')->insert(
                [
                    'title' => $name,
                    'image' => $image1,
                    // 'image2' => $image2,
                    // 'image3' => $image3,
                    // 'image4' => $image4,
                    // 'image5' => $image5,
                    // 'image6' => $image6,
                    // 'image7' => $image7,
                    // 'image8' => $image8,
                    // 'image9' => $image9,
                    // 'image10' => $image10,
                    'description' => $description,
                    'create_date' => $todaydate,
                    'create_month' => $month
                ]
            );

        return redirect('/events')->with('success', 'Event Added Successfully');
    }

    public function eventupdate(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/backend_images/', $filename);
            $blog = $filename;
        } else {
            $blog = $request->oldimage;
        }
        $description = $request->description;

        DB::table('events')->where('id', $id)->update(array(
            'title' => $name,
            'image' => $blog,
            'Description' => $description,
        ));

        return redirect('/events')->with('success', 'Event Updated Successfully');
    }
}

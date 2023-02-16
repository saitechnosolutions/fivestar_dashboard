<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $machine = DB::table('machines')
        ->select('*')
        ->get();
        return view('pages.machines',compact('machine'));
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

        $machine = Machine::find($id);
        // dd($machine->id);

        $machinespec = DB::table('machine_specs')
        ->select('*')
        ->where('machine_id','=',$id)
        ->get();

        $machinefeature = DB::table('machine_features')
        ->select('*')
        ->where('machine_id','=',$id)
        ->get();

        $suitable_fors = DB::table('suitable_fors')
        ->select('*')
        ->where('machine_id','=',$id)
        ->get();

        return view('pages.machineedit',compact('machine','machinespec','machinefeature','suitable_fors'));
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
        $machine = Machine::find($id);
        $machine -> delete();
        DB::table('machine_features')->where('machine_id', $id)->delete();
        DB::table('machine_spec')->where('machine_id', $id)->delete();
        return redirect('/machines')->with('success','Machine Deleted Successfully');
    }

    public function savemachine(Request $request)
    {

        if($request->hasfile('img_name'))
        {
            $file1 = $request->file('img_name');
            $extension1 = $file1 ->getClientOriginalExtension();
            $filename1= "machine_".time().'.'.$extension1;
            $file1->move('images/backend_images/',$filename1);

            $image = $filename1;
        }

        if($request->hasfile('catalog_img'))
        {
            $file = $request->file('catalog_img');
            $extension = $file ->getClientOriginalExtension();
            $filename = "catelog_".time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $catalog_img = $filename;
        }

        $videolink = $request->videolink;
        $name = $request->name;

        $machine = DB::table('machines')->insert(
            [
                'name' => $name,
                'video_link' => $videolink,
                'image' => $filename1,
                'catalog_file' => $filename,
            ]);

            $attrname = $request->attrname;

            $id = DB::getPdo()->lastInsertId();;

            foreach($attrname as $key => $attrname)
            {

                $data = $request->attrname[$key];
                $data1 = $request->value[$key];

                $machine = DB::table('machine_spec')->insert(
                    [
                        'attribute_name' => $data,
                        'value' => $data1,
                        'machine_id' => $id,
                    ]);
            }

            $features = $request->features;

            foreach($features as $key => $features)
            {

                $data = $request->features[$key];

                $machine = DB::table('machine_features')->insert(
                    [
                        'value' => $data,
                        'machine_id' => $id,
                    ]);
            }

            $suitablefor = $request->suitablefor;

            foreach($suitablefor as $key => $suitablefor)
            {

                $data = $request->suitablefor[$key];

                $machine = DB::table('suitable_for')->insert(
                    [
                        'value' => $data,
                        'machine_id' => $id,
                    ]);
            }

            if($machine)
            {
                return redirect('/machines')->with('success','Machine Added Successfully');
            }
    }

    public function updatemachine(Request $request)
    {
        $id = $request->machineid;

        if($request->hasfile('img_name'))
        {
            $file1 = $request->file('img_name');
            $extension1 = $file1 ->getClientOriginalExtension();
            $filename1= "machine_".time().'.'.$extension1;
            $file1->move('images/backend_images/',$filename1);

            $image = $filename1;
        }
        else
        {
            $image = $request->oldimage;
        }

        if($request->hasfile('catalog_img'))
        {
            $file = $request->file('catalog_img');
            $extension = $file ->getClientOriginalExtension();
            $filename = "catelog_".time().'.'.$extension;
            $file->move('images/backend_images/',$filename);

            $catalog_img = $filename;
        }
        else
        {
            $catalog_img = $request->oldcatimg;
        }

        $videolink = $request->videolink;
        $name = $request->name;

        $machine= DB::table('machines')->where('id',$id)->update(array(
            'name'=>$name,
            'image'=>$image,
            'catalog_file'=>$catalog_img,
            'video_link'=>$videolink
        ));

        $features = $request->features;

            dd($features);
            foreach($features as $key => $features)
            {

                $data = $request->features[$key];

                $machine= DB::table('machine_features')->where('machine_id',$id)->update(array(
                    'value' => $data,
                ));


            }

            $attrname = $request->attrname;



            foreach($attrname as $key => $attrname)
            {

                $data = $request->attrname[$key];
                $data1 = $request->value[$key];

                $machine= DB::table('machine_specs')->where('machine_id',$id)->update(array(
                    'attribute_name' => $data,
                        'value' => $data1,

                ));

            }

            $suitablefor = $request->suitablefor;

            foreach($suitablefor as $key => $suitablefor)
            {

                $data = $request->suitablefor[$key];

                $machine= DB::table('suitable_fors')->where('machine_id',$id)->update(array(
                    'value' => $data,


                ));
            }

            if($machine)
            {
                return redirect('/products')->with('success','Product Updated Successfully');
            }
    }
}

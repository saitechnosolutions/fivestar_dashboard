<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $material = DB::table('materials')
        ->select('*')
        ->get();
        return view('pages.material',compact('material'));
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
        $material = Material::find($id);
        return view('pages.materialedit',compact('material'));
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
        $material = Material::find($id);
        $material -> delete();
        return redirect('/material')->with('success','Material Deleted Successfully');
    }

    public function savematerial(Request $request)
    {
        $areaname = $request->areaname;

        foreach($areaname as $key => $areaname)
            {

                $productname = $request->productname[$key];
                $price = $request->price[$key];

                $machine = DB::table('materials')->insert(
                    [
                        'date' => date('d-m-Y'),
                        'areaname' => $areaname,
                        'product_name' => $productname,
                        'price' => $price,
                    ]);

            }

            if($machine)
            {
                return redirect('/material')->with('success','material Added Successfully');
            }
            else
            {
                return redirect('/machines')->with('success','Machine Added Successfully');
            }
    }

    public function materialupdate(Request $request)
    {
        $areaname = $request->areaname;
        $productname = $request->productname;
        $price = $request->price;
        $id = $request->id;

        $material= DB::table('materials')->where('id',$id)->update(array(
            'areaname' => $areaname,
        'product_name' => $productname,
        'price' => $price,
        ));

        if($material)
        {
            return redirect('/material')->with('success','Material Updated Successfully');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $products = DB::table('products')
        ->select('*')
        ->get();
        return view('pages.products',compact('machine','products'));
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
        $product = Product::find($id);
        $machine = DB::table('machines')
        ->select('*')
        ->get();
        return view('pages.productedit',compact('product','machine'));
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
        $machine = Product::find($id);
        $machine -> delete();
        return redirect('/products')->with('success','Application Product Deleted Successfully');
    }

    public function saveproduct(Request $request)
    {
        // $machinesid = $request->machinesid;

        $name = $request->name;
        $machinesid = implode(',', $request->machinesid);
        // dd($machinesid);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/backend_images/',$filename);
            $image = $filename;
        }

        $product = DB::table('products')->insert(
            [
                'title' => $name,
                'image' => $image,
                'machinesid' => $machinesid,
            ]);

        if($product)
        {
            return redirect('/products')->with('success','Product Added Successfully');
        }
    }

    public function updateproduct(Request $request)
    {
        // dd($request->image1);
        $name = $request->name;
        // $machinesid = implode(',', $request->machinesid);
        $productid = $request->productid;
        $mid=$request->machinesid;

        $getmachineid =  DB::table('products')
        ->select('machinesid')
        ->where('id','=',$productid)
        ->first();
        $getmachine = $getmachineid->machinesid;

        $var1 = $getmachine;
        // $var2 = strpos($mid,"", $var1);
        $var2 = strpos($getmachine, $mid);

        // return back()->with('success',$var2);
        if($var2 != '')
        {
                return back()->with('success','already updated');
        }
        else
        {
            if($request->hasfile('image1'))
            {
                $file = $request->file('image1');
                $extension = $file ->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('images/backend_images/',$filename);
                $image = $filename;
            }
            else
            {
                $image = $request->oldimage;
            }

            $product= DB::table('products')->where('id',$productid)->update(array(
                'title'=>$name,
                'image'=>$image,
                'machinesid'=>$getmachine.",".$mid
            ));

            if($product)
            {
                return redirect('/products')->with('success','Product Updated Successfully');
            }
        }


    }


    public function remove(Request $request)
    {
        $id = $request->id;
        $productid = $request->productid;

      $getmachineid =  DB::table('products')
        ->select('machinesid')
        ->where('id','=',$productid)
        ->first();
        $machinesid = $getmachineid->machinesid;

        $var1 = $machinesid;
        $var2 = str_replace($id,"", $var1);

        $product= DB::table('products')->where('id',$productid)->update(array(
            'machinesid'=>$var2
        ));

        return $id;
    }
}

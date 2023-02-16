@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Material Product Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>

                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>


                </div>
            </div>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <!--end breadcrumb-->
        <!-- Section: Pricing table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Area Name</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delet</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($material)
                                @foreach ($material as $mac)
                                       <tr>
                                           <td style="vertical-align:middle" class="text-center">{{$mac->date}}</td>
                                           <td style="vertical-align:middle" class="text-center">{{$mac->areaname}}</td>
                                           <td style="vertical-align:middle" class="text-center">{{$mac->product_name}}</td>
                                           <td style="vertical-align:middle" class="text-center">{{$mac->price}}</td>
                                           <td style="vertical-align:middle"><a href="{{route('material.edit',$mac->id)}}" class="btn btn-primary">Edit</a></td>
                                           <td class="text-center" style="vertical-align:middle">

                                            <form method="POST" action="{{route('material.destroy',$mac->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger button">Delete</button>
                                            </form>
                                           </td>
                                        </tr>
                                @endforeach
                            @endif


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- Section: Pricing table -->
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form class="row g-3" method="POST" action="/savematerial" enctype="multipart/form-data">
    @csrf



    <table class="table table-bordered table-scroll mt-3" id="productTable">
        <thead >
            <tr>
                <th scope="col">Area Name<span id="fname" class="error-info fname" style="margin-left: 10px; color:red;"></span></th>
                <th scope="col">Product Name<span id="frelation" class="error-info frelation" style="margin-left: 10px; color:red;"></span></th>
                <th scope="col">Price<span id="frelation" class="error-info frelation" style="margin-left: 10px; color:red;"></span></th>

                <th scope="col"><button type="button" class="btn btn-primary" id="addmaterial">+</button></th>
            </tr>
        </thead>
        <tbody id="appp4">

            {{-- <tr>
                <td><input class="form-control f_name" type="text" name="areaname[]" id="f_name" placeholder="Area Name"></td>
                <td><input class="form-control f_relation" type="text" name="productname[]" id="f_relation" placeholder="Product Name"></td>
                <td><input class="form-control f_relation" type="text" name="price[]" id="f_relation" placeholder="Price"></td>
                <td><button type="button" class="btn btn-danger">X</button></td>
            </tr> --}}
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>

@endsection

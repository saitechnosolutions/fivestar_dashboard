@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Application Product Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>

                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>


                </div>
            </div> --}}
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
                <form class="row g-3" method="POST" action="/updateproduct" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <label for="inputFirstName" class="form-label"><b>Product Name</b></label>
                        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Product Title" value="{{$product->title}}">
                    </div>
                    <div class="col-sm-12">
                        <label for="inputLastName" class="form-label"><b>Image</b></label>
                        <input type="file" class="form-control" id="inputLastName" name="image1" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage" value="{{$product->image}}">
                        <img src="/images/backend_images/{{$product->image}}" class="img-fluid" style="width:200px">
                    </div>
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label"><b>Selected Machines</b></label>
                        @if($machines = App\Models\Product::where('id', array($product->id))->first())
                            {{-- {{$machines->machinesid}} --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Machine Name</th>
                                        <th>Remove Machine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(explode(',', $machines->machinesid) as $info)

                                    @if ($machines = App\Models\Machine::where('id', array($info))->first())

                                        <tr>
                                                <td>{{$machines->name}}</td>
                                                {{-- <td>{{$machines->id}}</td> --}}
                                                <td><a  data-id="{{$machines->id}}" data-productid="{{$product->id}}" class="btn btn-danger removeid">remove</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            </table>
                        @endif
                        <label for="inputEmailAddress" class="form-label"><b>Add New Machines</b></label>
                        <select class="form-control "  name="machinesid">
                            <option value="">-- Choose Machines --</option>
                            @if($machine)

                            @foreach ($machine as $mac)
                                <option value="{{$mac->id}}">{{$mac->name}}</option>
                            @endforeach

                        @endif

                        </select>
                    </div>


                    <input type="hidden" name="productid" value="{{$product->id}}">
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save Machines</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Section: Pricing table -->
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form class="row g-3" method="POST" action="/saveproduct" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Product Title">
    </div>
    <div class="col-sm-12">
        <label for="inputLastName" class="form-label">Image</label>
        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Mobile Number">
    </div>
    <div class="col-12">
        <label for="inputEmailAddress" class="form-label">Machines</label>
        <select class="form-control multiple-select" multiple="multiple" name="machinesid[]">
            <option value="">-- Choose Machines --</option>
            @if($machine)

                @foreach ($machine as $mac)
                    <option value="{{$mac->id}}">{{$mac->name}}</option>
                @endforeach

            @endif

        </select>
    </div>



    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save Machines</button>
        </div>
    </div>
</form>
</div>
</div>
</div>

@endsection

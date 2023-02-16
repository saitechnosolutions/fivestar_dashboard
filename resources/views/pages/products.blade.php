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

                                <th class="text-center">Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if($products)
                                @foreach ($products as $mac)
                                       <tr>
                                           <td style="vertical-align:middle" class="text-center">{{$mac->title}}</td>
                                           <td style="vertical-align:middle"><img class="img-fluid" style="width:70px;margin:0 auto;display:block" src="images/backend_images/{{$mac->image}}"></td>
                                           <td style="vertical-align:middle"><a href="{{route('products.edit',$mac->id)}}" class="btn btn-primary">Edit</a></td>
                                           <td class="text-center" style="vertical-align:middle">

                                            <form method="POST" action="{{route('products.destroy',$mac->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
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

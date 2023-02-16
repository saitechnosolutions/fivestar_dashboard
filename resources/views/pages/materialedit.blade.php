@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Material Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        {{-- <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li> --}}

                    </ol>
                </nav>
            </div>
            <!--<div class="ms-auto">-->
            <!--    <div class="btn-group">-->
            <!--        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Gallery</button>-->


            <!--    </div>-->
            <!--</div>-->
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
                <form class="row g-3" method="POST" action="/materialupdate" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Area Name</label>
        <input type="text" class="form-control" id="inputFirstName" name="areaname" placeholder="Area Name" value="{{$material->areaname}}">
    </div>
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="inputFirstName" name="productname" placeholder="Product Name" value="{{$material->product_name}}">
    </div>
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Price</label>
        <input type="text" class="form-control" id="inputFirstName" name="price" placeholder="Price" value="{{$material->price}}">
    </div>



    <input type="hidden" name="id" value="{{$material->id}}">
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Update Details</button>
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
<h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

</div>
</div>
</div>

@endsection

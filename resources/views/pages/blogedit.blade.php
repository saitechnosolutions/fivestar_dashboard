@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">GK Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>

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
                <form class="row g-3" method="POST" action="/blogupdate" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">GK Title</label>
        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Blog Title" value="{{$blog->title}}">
    </div>
    {{-- <div class="col-sm-12">
        <label for="inputLastName" class="form-label">Image (1920 X 1080 px)</label>
        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Mobile Number">
        <img src="/images/backend_images/{{$blog->image}}" class="img-fluid">
        <input type="hidden" name="oldimage" value="{{$blog->image}}">
    </div> --}}
    <div class="col-lg-12">
        {{-- <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea> --}}
        <label for="inputLastName" class="form-label">GK Link</label>
        {{-- <textarea class="form-control" name="description" style="height:250px"></textarea> --}}
        <input type="text" class="form-control" name="description" value="{{$blog->description}}">
        {{-- <textarea id="summernote" name="description" style="height:550px" >{{$blog->description}}</textarea> --}}
    </div>

    <input type="hidden" name="id" value="{{$blog->id}}">
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save GK</button>
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

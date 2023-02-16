@extends('pages.layouts.default');
@section('title','Prime Educators - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Event Details</div>
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
                <form class="row g-3" method="POST" action="/eventupdate" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Event Title</label>
        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Event Title" value="{{$event->title}}">
    </div>
    <div class="col-sm-12">
        <label for="inputLastName" class="form-label">Image (600 x 500px)</label>
        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Mobile Number">
        <img src="/images/backend_images/{{$event->image}}" class="img-fluid" style="width:100px">
        <input type="hidden" name="oldimage" value="{{$event->image}}">
    </div>
    <div class="col-lg-12">
        {{-- <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea> --}}
        <label for="inputLastName" class="form-label">Event Link</label>
        {{-- <input type="text" id="summernote" class="form-control" name="description" placeholder="Enter link" value="{{$event->description}}"> --}}
        <textarea class="form-control" id="summernote" name="description" style="height:250px">{{$event->description}}</textarea>
        {{-- <textarea id="summernote" name="description" style="height:550px" >{{$event->description}}</textarea> --}}
    </div>

    <input type="hidden" name="id" value="{{$event->id}}">
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Event Update</button>
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

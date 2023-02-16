@extends('pages.layouts.default');
@section('title','Prime Educators - Dashboard');
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
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add GK</button>
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
                                <th class="text-center">Url Link</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($blog)
                            @foreach ($blog as $blogs)
                                <tr>
                                    <td class="text-center" style="vertical-align:middle">{{$blogs->title}}</td>
                                    <td class="text-center" style="vertical-align:middle">{{$blogs->description}}</td>
                                    <td class="text-center" style="vertical-align:middle"><a href="{{route('blog.edit',$blogs->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td class="text-center" style="vertical-align:middle">
                                        <form method="POST" action="{{route('blog.destroy',$blogs->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
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
<h5 class="modal-title" id="exampleModalLabel">Add Daily GK</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form class="row g-3" method="POST" action="/saveblog" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Title</label>
        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="GK Title" required>
    </div>
    {{-- <div class="col-sm-12">
        <label for="inputLastName" class="form-label">Image</label>
        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Image" required>
    </div> --}}
    <div class="col-lg-12">
        {{-- <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea> --}}
        <label for="inputLastName" class="form-label">Url Link</label>
        {{-- <textarea class="form-control" name="description" style="height:250px"></textarea> --}}
        <input type="text" class="form-control" name="description">
        {{-- <textarea id="summernote" name="description" style="height:550px" required></textarea> --}}
    </div>


    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save GK</button>
        </div>
    </div>
</form>
</div>
</div>
</div>

@endsection

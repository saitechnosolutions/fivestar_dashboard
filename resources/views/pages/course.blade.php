@extends('pages.layouts.default');
@section('title','Prime Educators - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course Details</div>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Course</button>


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
                                <th class="text-center">Course Category</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($course)
                                @foreach ($course as $c)
                                    <tr>
                                        <td>{{$c->course_category}}</td>
                                        <td>{{$c->course_name}}</td>
                                        <td>
                                            @if ($c->image != '')
                                                <img src="images/backend_images/{{$c->image}}" style="width:100px" class="img-fluid m-auto d-block">
                                                @else
                                                <p class="text-center">No Image</p>
                                            @endif

                                        </td>
                                        <td><a href="/courseedit/{{$c->id}}" class="btn btn-info">Edit</a></td>
                                        <td><a onclick="return confirm('Do You want Delete this Data?')" href="/coursedelete/{{$c->id}}" class="btn btn-danger">Delete</a></td>
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
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form class="row g-3" method="POST" action="/savecourse" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Course Category</label>
        <select class="form-control" name="coursecategory">
            <option>-- Choose Option --</option>
            <option value="School">School Level Course</option>
            <option value="College">College Level Course</option>
            <option value="Corporate">Corporate Level Course</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Courses Name</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Course Name"> --}}
        <textarea name="name" class="form-control" placeholder="Course Name"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Courses Offered</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="courseoffered" placeholder="Courses Offered"> --}}
        <textarea name="courseoffered" class="form-control" placeholder="Course Offered"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Course Fee</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="coursefee" placeholder="Course Fee"> --}}
        <textarea name="coursefee" class="form-control" placeholder="Course Fee"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Course Duration</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="duration" placeholder="Course Duration"> --}}
        <textarea class="form-control" name="duration" placeholder="Course Duration"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">No of Books</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="books" placeholder="No of Books"> --}}
        <textarea class="form-control" name="books" placeholder="No Of Books"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">No of Solved Questions</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="questions" placeholder="No of Solved Questions"> --}}
        <textarea class="form-control" name="questions" placeholder="No of Solved Questions"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Paper Based Exams</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="paperbasedexam" placeholder="Paper Based Exams"> --}}
        <textarea class="form-control" name="paperbasedexam" placeholder="Paper Based Exams"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Computer Based Tests</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="computerbasedtest" placeholder="Computer Based Tests"> --}}
        <textarea class="form-control" name="computerbasedtest" placeholder="Computer Based Tests"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Additional Material for Students</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="additionalmaterial" placeholder="Additional Material for Students"> --}}
        <textarea class="form-control" name="additionalmaterial" placeholder="Additional Material for Students"></textarea>
    </div>
    <div class="col-sm-6">
        <label for="inputFirstName" class="form-label">Infrastructure</label>
        {{-- <input type="text" class="form-control" id="inputFirstName" name="infrastructure" placeholder="Infrastructure"> --}}
        <textarea class="form-control" name="infrastructure" placeholder="Infrastructure"></textarea>
    </div>
    {{-- <div class="col-sm-12">
        <label for="inputFirstName" class="form-label">Sub Heading</label>
        <input type="text" class="form-control" id="inputFirstName" name="subheading" placeholder="Course Sub Heading">
    </div> --}}
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 1</label>
        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 2</label>
        <input type="file" class="form-control" id="inputLastName" name="image2" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 3</label>
        <input type="file" class="form-control" id="inputLastName" name="image3" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 4</label>
        <input type="file" class="form-control" id="inputLastName" name="image4" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 5</label>
        <input type="file" class="form-control" id="inputLastName" name="image5" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 6</label>
        <input type="file" class="form-control" id="inputLastName" name="image6" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 7</label>
        <input type="file" class="form-control" id="inputLastName" name="image7" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 8</label>
        <input type="file" class="form-control" id="inputLastName" name="image8" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 9</label>
        <input type="file" class="form-control" id="inputLastName" name="image9" placeholder="Mobile Number">
    </div>
    <div class="col-sm-6">
        <label for="inputLastName" class="form-label">Image 10</label>
        <input type="file" class="form-control" id="inputLastName" name="image10" placeholder="Mobile Number">
    </div>

    <div class="col-12">
        <label for="inputEmailAddress" class="form-label">Details</label>
        <textarea id="summernote" name="editordata" style="height:350px"></textarea>
    </div>

    <div class="col-12">
        <label for="inputEmailAddress" class="form-label">Upload Brochure</label>
        <input type="file" class="form-control" id="inputLastName" name="brochure" placeholder="Mobile Number">
    </div>





    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save Course</button>
        </div>
    </div>
</form>
</div>
</div>
</div>

@endsection

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
                <form class="row g-3" method="POST" action="/updatecourse" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <label for="inputFirstName" class="form-label">Course Category</label>
                        <select class="form-control" name="coursecategory">
                            <option>-- Choose Option --</option>
                            <option value="School" @if($course->course_category == 'School') selected @else @endif>School Level Course</option>
                            <option value="College" @if($course->course_category == 'College') selected @else @endif>College Level Course</option>
                            <option value="Corporate" @if($course->course_category == 'Corporate') selected @else @endif>Corporate Level Course</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Courses Name</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Course Name"> --}}
                        <textarea name="name" class="form-control" placeholder="Course Name">{{$course->course_name}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Courses Offered</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="courseoffered" placeholder="Courses Offered"> --}}
                        <textarea name="courseoffered" class="form-control" placeholder="Course Offered">{{$course->course_offered}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Course Fee</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="coursefee" placeholder="Course Fee"> --}}
                        <textarea name="coursefee" class="form-control" placeholder="Course Fee">{{$course->coursefee}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Course Duration</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="duration" placeholder="Course Duration"> --}}
                        <textarea class="form-control" name="duration" placeholder="Course Duration">{{$course->duration}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">No of Books</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="books" placeholder="No of Books"> --}}
                        <textarea class="form-control" name="books" placeholder="No Of Books">{{$course->books}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">No of Solved Questions</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="questions" placeholder="No of Solved Questions"> --}}
                        <textarea class="form-control" name="questions" placeholder="No of Solved Questions">{{$course->questions}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Paper Based Exams</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="paperbasedexam" placeholder="Paper Based Exams"> --}}
                        <textarea class="form-control" name="paperbasedexam" placeholder="Paper Based Exams">{{$course->paperbasedexam}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Computer Based Tests</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="computerbasedtest" placeholder="Computer Based Tests"> --}}
                        <textarea class="form-control" name="computerbasedtest" placeholder="Computer Based Tests">{{$course->computerbasedtest}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Additional Material for Students</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="additionalmaterial" placeholder="Additional Material for Students"> --}}
                        <textarea class="form-control" name="additionalmaterial" placeholder="Additional Material for Students">{{$course->additionalmaterial}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Infrastructure</label>
                        {{-- <input type="text" class="form-control" id="inputFirstName" name="infrastructure" placeholder="Infrastructure"> --}}
                        <textarea class="form-control" name="infrastructure" placeholder="Infrastructure">{{$course->infrastructure}}</textarea>
                    </div>
                    {{-- <div class="col-sm-12">
                        <label for="inputFirstName" class="form-label">Sub Heading</label>
                        <input type="text" class="form-control" id="inputFirstName" name="subheading" placeholder="Course Sub Heading">
                    </div> --}}
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 1</label>
                        <input type="file" class="form-control" id="inputLastName" name="image" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage1" value="{{$course->image}}">
                        <img src="/images/backend_images/{{$course->image}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 2</label>
                        <input type="file" class="form-control" id="inputLastName" name="image2" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage2" value="{{$course->image2}}">
                        <img src="/images/backend_images/{{$course->image2}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 3</label>
                        <input type="file" class="form-control" id="inputLastName" name="image3" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage3" value="{{$course->image3}}">
                        <img src="/images/backend_images/{{$course->image3}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 4</label>
                        <input type="file" class="form-control" id="inputLastName" name="image4" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage4" value="{{$course->image4}}">
                        <img src="/images/backend_images/{{$course->image4}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 5</label>
                        <input type="file" class="form-control" id="inputLastName" name="image5" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage5" value="{{$course->image5}}">
                        <img src="/images/backend_images/{{$course->image5}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 6</label>
                        <input type="file" class="form-control" id="inputLastName" name="image6" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage6" value="{{$course->image6}}">
                        <img src="/images/backend_images/{{$course->image6}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 7</label>
                        <input type="file" class="form-control" id="inputLastName" name="image7" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage7" value="{{$course->image7}}">
                        <img src="/images/backend_images/{{$course->image7}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 8</label>
                        <input type="file" class="form-control" id="inputLastName" name="image8" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage8" value="{{$course->image8}}">
                        <img src="/images/backend_images/{{$course->image8}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 9</label>
                        <input type="file" class="form-control" id="inputLastName" name="image9" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage9" value="{{$course->image9}}">
                        <img src="/images/backend_images/{{$course->image9}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Image 10</label>
                        <input type="file" class="form-control" id="inputLastName" name="image10" placeholder="Mobile Number">
                        <input type="hidden" name="oldimage10" value="{{$course->image10}}">
                        <img src="/images/backend_images/{{$course->image10}}" width="100px">
                    </div>

                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Details</label>
                        <textarea id="summernote" name="editordata" style="height:350px">{{$course->course_details}}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Upload Brochure</label>
                        <input type="file" class="form-control" id="inputLastName" name="brochure" placeholder="Mobile Number">
                        <input type="hidden" name="oldbrochure" value="{{$course->brochure}}">
                            @if($course->brochure != '')
                                <a target="_blank" href="/images/backend_images/{{$course->brochure}}">View Brochure</a>
                                @else

                            @endif
                    </div>
                    <input type="hidden" name="id" value="{{$course->id}}">



                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Update Course</button>
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

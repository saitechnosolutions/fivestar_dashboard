@extends('pages.layouts.default');
@section('title','Prime Educators - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Exam Notifications</div>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Exam Notifications</button>


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

                                {{-- <th class="text-center">Course Name</th> --}}
                                <th class="text-center">Exam Name</th>
                                <th class="text-center">Register Start Date</th>
                                <th class="text-center">Register End Date</th>
                                {{-- <th class="text-center">Position</th> --}}
                                <th class="text-center">Exam Date</th>
                                <th class="text-center">Website</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if($notification)
                                @foreach ($notification as $n)
                                    <tr>
                                        {{-- <td>{{$n->course_name}}</td> --}}
                                        <td>{{$n->exam_name}}</td>
                                        <td>{{$n->r_start_date}}</td>
                                        <td>{{$n->r_end_date}}</td>
                                        {{-- <td>{{$n->e_position}}</td> --}}
                                        <td>{{$n->exam_date}}</td>
                                        <td><a href="{{$n->website}}" target="_blank">Link</a></td>
                                        <td>
                                            <a href="/notificationedit/{{$n->id}}" class="btn btn-info">Edit</a>
                                            <a href="/examdelete/{{$n->id}}" onclick="return confirm('Do You want Delete this Data?')" class="btn btn-danger">Delete</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Exam Notifications</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <form method="POST" action="/savemachine" enctype="multipart/form-data">
                  @csrf
                    {{-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Select Course</label>
                        <select class="form-control" name="course">
                            <option>-- Select Course Name --</option>
                            @if ($course)
                                @foreach ($course as $c)
                                    <option value="{{$c->course_name}}">{{$c->course_name}}</option>
                                @endforeach
                            @endif

                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                        <select class="form-control" name="course">
                            <option>-- Select Course Name --</option>
                            <option value="1">CAT/MBA</option>
                            <option value="2">Bank/SSC</option>
                            <option value="3">CLAT</option>
                            <option value="4">CUET</option>
                            <option value="5">TANCET/NIMCET</option>
                        </select>
                        {{-- <input type="text" class="form-control" id="exampleFormControlInput1" name="examname" placeholder="Enter Heading"> --}}
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Exam Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="examname" placeholder="Enter Heading">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Exam Full Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phase" placeholder="Enter Heading">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Registration Start Date</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="registerstartdate" placeholder="Registration Start Date">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Registration End Date</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="registerenddate" placeholder="Registration End Date">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrance Position</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="entranceposition" placeholder="Entrance Position">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Exam Date</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="examdate" placeholder="Exam Date">
                    </div>



                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Website Link</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="websitelink" placeholder="Enter Heading">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Notification PDF</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="notificationpdf" placeholder="Enter Heading">
                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection

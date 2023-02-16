@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Exam Notification</div>
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
                <form method="POST" action="/updatenotification" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                        <select class="form-control" name="course">
                            <option>-- Select Course Name --</option>
                            <option value="1" @if($examedit->course_name == '1') selected @else  @endif>CAT/MBA</option>
                            <option value="2" @if($examedit->course_name == '2') selected @else  @endif>Bank/SSC</option>
                            <option value="3" @if($examedit->course_name == '3') selected @else  @endif>CLAT</option>
                            <option value="4" @if($examedit->course_name == '4') selected @else  @endif>CUET</option>
                            <option value="5" @if($examedit->course_name == '5') selected @else  @endif>TANCET/NIMCET</option>
                        </select>
                        {{-- <input type="text" class="form-control" id="exampleFormControlInput1" name="examname" placeholder="Enter Heading"> --}}
                    </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Exam Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="examname" placeholder="Enter Heading" value="{{$examedit->exam_name}}">
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Registration Start Date</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="registerstartdate" placeholder="Registration Start Date" value="{{$examedit->r_start_date}}">
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Registration End Date</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="registerenddate" placeholder="Registration End Date" value="{{$examedit->r_end_date}}">
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Entrance Position</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="entranceposition" placeholder="Entrance Position" value="{{$examedit->e_position}}">
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Exam Date</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="examdate" placeholder="Exam Date" value="{{$examedit->exam_date}}">
                      </div>



                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Website Link</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="websitelink" placeholder="Enter Heading" value="{{$examedit->website}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Notification PDF</label>
                      <input type="file" class="form-control" id="exampleFormControlInput1" name="notificationpdf" placeholder="Enter Heading">
                      <input type="hidden" name="oldnotification" value="{{$examedit->notification_pdf}}">
                        <img src="/images/backend_images/{{$examedit->notification_pdf}}" width="100px">
                  </div>
                  <input type="hidden" name="id" value="{{$examedit->id}}">

          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update changes</button>
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

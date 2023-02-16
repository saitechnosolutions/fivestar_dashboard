@extends('pages.layouts.default');
@section('title','Prime Educators - Testimonials');
@section('main-content')

    <div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Testimonials</div>
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
							{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Caste</button> --}}


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
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card pb-3" >
                            <div class="card-body">
                                <form class="row g-3" method="POST" action="/updatetestimonials" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12">
                                        <label for="inputFirstName" class="form-label">Category</label>
                                        <select class="form-control" name="category">
                                            <option>-- Choose Option --</option>
                                            <option value="Competitive" @if ($testimonials->category == 'Competitive')
                                                selected
                                                @else
                                            @endif>Competitive</option>
                                            <option value="Corporate" @if ($testimonials->category == 'Corporate')
                                                selected
                                                @else
                                            @endif>Corporate</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="inputFirstName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="name" placeholder="Testimonials Name" value="{{$testimonials->Title}}">
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="inputLastName" class="form-label">Video Link</label>
                                        <input type="text" class="form-control" id="inputLastName" name="videolink" placeholder="Video Link" value="{{$testimonials->video_link}}">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Description</label>
                                        {{-- <textarea class="form-control" name="testidescription"></textarea> --}}
                                        <textarea id="summernote" name="testidescription" style="height:350px">{{$testimonials->Description}}</textarea>
                                    </div>
                                    <input type="hidden" name="id" value="{{$testimonials->id}}}">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Update Testimonials</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Caste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    </div>
  </div>
</div>
@endsection

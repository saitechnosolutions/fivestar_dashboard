@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

    <div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Hero Images</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						{{-- <div class="btn-group">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Image</button>


						</div> --}}
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
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>About Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="1">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage2->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Application Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage2->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="2">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage3->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Machines Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage3->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="3">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage4->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Product Gallery Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage4->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="4">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage5->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Video Gallery Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage5->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="5">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage6->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Blog Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage6->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="6">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage7->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Events Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage7->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="7">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <img src="images/backend_images/{{$aboutheroimage8->image_name}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="/updateheroimage" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-control">

                                    <h6>Contact Us Page Hero Image (Size : 1400 X 350px)</h6>
                                    <br>
                                    <input type="hidden" name="oldheroimage" value="{{$aboutheroimage8->image_name}}">
                                    <input type="file" class="form-control"  name="image">
                                    <input type="hidden" name="id" value="8">
                                    <br>
                                    <button class="btn btn-success">Update Image</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Banner Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="img_name" placeholder="Enter Caste Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Heading</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="heading" placeholder="Enter Heading">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Text</label>
                    <textarea class="form-control" name="text" placeholder="Enter Text"></textarea>
                    {{-- <input type="text" class="form-control" id="exampleFormControlInput1" name="heading" placeholder="Enter Heading"> --}}
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Button Link</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="link" placeholder="Enter Link">
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

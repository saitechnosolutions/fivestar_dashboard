@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Application Product Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>

                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>


                </div>
            </div> --}}
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
                <form method="POST" action="/updatemachine" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="img_name" placeholder="Enter Caste Name">
                        <input type="hidden" name="oldimage" value="{{$machine->image}}">
                      <img src="/images/backend_images/{{$machine->image}}" class="img-fluid" style="width:200px">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Catalog File</label>
                      <input type="file" class="form-control" id="exampleFormControlInput1" name="catalog_img" placeholder="Enter Caste Name">
                      <input type="hidden" name="oldcatimg" value="{{$machine->catalog_file}}">
                      <img src="/images/backend_images/{{$machine->catalog_file}}" class="img-fluid" style="width:200px">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Video Link</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="videolink" placeholder="Enter Heading" value="{{$machine->video_link}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Machine Name</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter Heading" value="{{$machine->name}}">
                  </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Specifications</h6>
                          <table class="table table-bordered table-scroll mt-3" id="productTable">
                              <thead>
                                  <tr>
                                      <th scope="col">Attribute<span id="fname" class="error-info fname" style="margin-left: 10px; color:red;"></span></th>
                                      <th scope="col">Value<span id="frelation" class="error-info frelation" style="margin-left: 10px; color:red;"></span></th>
                                      <th scope="col"><button type="button" class="btn btn-primary" id="addProduct1">+</button></th>
                                  </tr>
                              </thead>
                              <tbody id="appp">
                                @if($machinespec)
                                @foreach ($machinespec as $spec)
                                <tr>
                                    <td><input class="form-control f_name" type="text" name="attrname[]" id="f_name" placeholder="Name" value="{{$spec->attribute_name}}"></td>
                                    <td><input class="form-control f_relation" type="text" name="value[]" id="f_relation" placeholder="Relation" value="{{$spec->value}}"></td>
                                    <td><button type="button" class="btn btn-danger">X</button></td>
                                </tr>
                                @endforeach
                            @endif
                                  {{-- <tr>
                                      <td><input class="form-control f_name" type="text" name="attrname[]" id="f_name" placeholder="Name"></td>
                                      <td><input class="form-control f_relation" type="text" name="value[]" id="f_relation" placeholder="Relation"></td>
                                      <td><button type="button" class="btn btn-danger">X</button></td>
                                  </tr> --}}
                                      </tbody>
                                  </table>
                        </div>
                        <div class="col-lg-6">
                          <h6>Features</h6>
                          <table class="table table-bordered table-scroll mt-3" id="productTable1">
                              <thead>

                                  <tr>
                                      <th scope="col">Value</th>

                                      <th scope="col"><button type="button" class="btn btn-primary" id="addProduct">+</button></th>
                                  </tr>
                              </thead>
                              <tbody id="appp2">
                                    @if($machinefeature)
                                        @foreach ($machinefeature as $feature)
                                        <tr>
                                            <td><input class="form-control" type="text" name="features[]" placeholder="Features" value="{{$feature->value}}"></td>
                                            <td><button type="button" class="btn btn-danger">X</button></td>
                                        </tr>
                                        @endforeach
                                    @endif

                              </tbody>
                                      </table>
                        </div>
                        <div class="col-lg-6">
                          <h6>Suitable For</h6>
                          <table class="table table-bordered table-scroll mt-3" id="productTable1">
                              <thead>

                                  <tr>
                                      <th scope="col">Value</th>

                                      <th scope="col"><button type="button" class="btn btn-primary" id="addProduct2">+</button></th>
                                  </tr>
                              </thead>
                              <tbody id="appp3">
                                  @if($suitable_fors)
                                    @foreach ($suitable_fors as $suitable)
                                    <tr>
                                        <td><input class="form-control" type="text" name="suitablefor[]" placeholder="Suitable For" value="{{$suitable->value}}"></td>
                                        <td><button type="button" class="btn btn-danger">X</button></td>
                                    </tr>
                                    @endforeach
                                  @endif

                              </tbody>
                                      </table>
                        </div>
                    </div>

          </div>
          <input type="hidden" name="machineid" value="{{$machine->id}}">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
            </div>
        </div>
        <!-- Section: Pricing table -->
    </div>
</div>



@endsection

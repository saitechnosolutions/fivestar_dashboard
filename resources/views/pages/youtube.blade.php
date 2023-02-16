@extends('pages.layouts.default');
@section('title','Varan - Dashboard');
@section('main-content')

    <div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Youtube Videos</div>
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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Youtube Video</button>


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

                                        <th class="text-center">Youtube Video Link</th>
                                        <th class="text-center">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($youtube)

                                    @foreach ($youtube as $links)
                                        <tr>
                                            {{-- {{$username = $user->name}} --}}
                                            <td>{{$links->videolink}}</td>
                                            <td class="text-center" style="vertical-align:middle">
                                                <form method="POST" action="{{route('youtubevideo.destroy',$links->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Youtube Videos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="POST" action="{{route('youtubevideo.store')}}">
            @csrf
            <div class="col-sm-12">
                <label for="inputFirstName" class="form-label">Machine</label>
                <select class="form-control" name="machinename">
                    <option value="">-- Choose Products --</option>
                    <option value="Maxi MS">Maxi MS</option>
                    <option value="Maxi SS">Maxi SS</option>
                    <option value="ECO SS">ECO SS</option>
                    <option value="Wood King SS">Wood King SS</option>
                    <option value="Wood King MS">Wood King MS</option>
                    <option value="Maxi Plus SS">Maxi Plus SS</option>
                    <option value="Maxi Plus MS">Maxi Plus MS</option>
                    <option value="ECO MS">ECO MS</option>
                    <option value="K10 MS">K10 MS</option>
                    <option value="K10 SS">K10 SS</option>
                    <option value="K Series MS">K Series MS</option>
                    <option value="K Series SS">K Series SS</option>
                    <option value="Basic Model">Basic Model</option>
                    <option value="Chase Model">Chase Model</option>
                    <option value="Jumbo MS">Jumbo MS</option>
                    <option value="Jumbo SS">Jumbo SS</option>
                    <option value="Copra Cutter">Copra Cutter</option>
                    <option value="Oil Cake Powder Machine">Oil Cake Powder Machine</option>
                    <option value="Bottle Filling Machine">Bottle Filling Machine</option>
                    <option value="Filter Press">Filter Press</option>
                </select>

            </div>
            <div class="col-sm-12">
                <label for="inputFirstName" class="form-label">Video Embeded Link</label>
                <input type="text" class="form-control" id="inputFirstName" name="youtubelink" placeholder="Embded Link">
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Add Link</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection


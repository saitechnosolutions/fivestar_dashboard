@extends('pages.layouts.default');
@section('title', 'Five Star Garden - Dashboard');
@section('main-content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Events Details</div>
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Add Events</button>
                    </div>
                </div>
            </div>
            @if (session()->get('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
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
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($event)
                                    @foreach ($event as $events)
                                        <tr>
                                            <td class="text-center" style="vertical-align:middle">{{ $events->title }}</td>
                                            <td class="text-center" style="vertical-align:middle"><img style="width:75px"
                                                    src="images/backend_images/{{$events->image}}"
                                                    class="img-fluid"></td>
                                            <!--<td>{{ $events->description }}</td>-->
                                            <td class="text-center" style="vertical-align:middle"><a
                                                    href="{{ route('events.edit', $events->id) }}"
                                                    class="btn btn-primary">Edit</a></td>
                                            <td class="text-center" style="vertical-align:middle">
                                                <form method="POST" action="{{ route('events.destroy', $events->id) }}"
                                                    onsubmit="return confirm('Do You want Delete this Data?')">
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="/saveEvent" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <label for="inputFirstName" class="form-label">Events Title</label>
                            <input type="text" class="form-control" id="inputFirstName" name="name"
                                placeholder="Event Title">


                        </div>
                        <div class="col-sm-12">
                            <label for="inputLastName" class="form-label">Image (600 x 500px)</label>
                            <input type="file" class="form-control  mt-lg-3 mt-sm-2 " id="inputLastName" name="image1"
                                placeholder="Mobile Number">

                        </div>

                        <div class="col-lg-12">
                            <label for="inputLastName" class="form-label">Link</label>
                            <textarea id="summernote" name="description" style="height:550px" required></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Save
                                    Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

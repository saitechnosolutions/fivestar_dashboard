@extends('pages.layouts.default');
@section('title','Five Star Restaurants - Dashboard');
@section('main-content')
<div class="page-wrapper">
    <div class="page-content">


        <div class="card radius-10">
            <div class="card-content">
                <div class="row row-group row-cols-1 row-cols-xl-4">

                    <div class="col" style="border-bottom:1px solid #ccc">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0"><b>Events</b></p>
                                    <h4 class="mt-4 text-secondary">{{$events}}</h4>
                                </div>
                                <div class="ms-auto"><i class="bx bx-block font-35 text-secondary" style="font-size:65px"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


      <!--end row-->



            <!--end row-->


            <!--end row-->

    </div>
</div>
@endsection

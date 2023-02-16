@extends('pages.layouts.default');
@section('title','Andavar Lathe Works - Dashboard');
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
                                    <p class="mb-0"><b>Total Machines</b></p>
                                    <h4 class="mt-4 text-primary"></h4>
                                </div>
                                <div class="ms-auto"><i class="bx bx-user text-primary" style="font-size:65px"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col" style="border-bottom:1px solid #ccc">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0"><b>Application Products</b></p>
                                    <h4 class="mt-4 text-danger">10</h4>
                                </div>
                                <div class="ms-auto"><i class="bx bx-wallet text-danger" style="font-size:65px"></i>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col" style="border-bottom:1px solid #ccc">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0"><b>Gallery</b></p>
                                    <h4 class="mt-4 text-success">10</h4>
                                </div>
                                <div class="ms-auto"><i class="bx bx-line-chart-down text-success" style="font-size:65px"></i>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col" style="border-bottom:1px solid #ccc">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0"><b>Videos</b></p>
                                    <h4 class="mt-4 text-secondary">10</h4>
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

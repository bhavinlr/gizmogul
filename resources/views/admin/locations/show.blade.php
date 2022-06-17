@extends('layouts.admin.master')

@section('main-content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Location Overview</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Location</a></li>
                            <li class="breadcrumb-item active">Location Overview</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15">Name :</h5>{{ $location->name }}
                            </div>
                        </div>

                        <h5 class="font-size-14 mt-2">Address :</h5>
                        <p class="text-muted">{{ $location->address }}</p>

                        <h5 class="font-size-14 mt-2">Address 2 :</h5>
                        <p class="text-muted">{{ $location->address2 }}</p>

                        <h5 class="font-size-14 mt-2">City :</h5>
                        <p class="text-muted">{{ $location->city }}</p>

                        <h5 class="font-size-14 mt-2">State :</h5>
                        <p class="text-muted">{{ $location->state }}</p>

                        <h5 class="font-size-14 mt-2">Zip :</h5>
                        <p class="text-muted">{{ $location->zip }}</p>

                        <h5 class="font-size-14 mt-2">Phone :</h5>
                        <p class="text-muted">{{ $location->phone }}</p>

                        <div class="row task-dates">
                            <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i>
                                        Created At
                                    </h5>
                                    <p class="text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($location->created_at)->format('d M, Y') }}
                                    </p>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date
                                    </h5>
                                    <p class="text-muted mb-0">12 Oct, 2019</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Attached Users</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    @foreach ($location->users as $key => $user)
                                        <tr>
                                            <td style="width: 50px;">
                                                <img src="{{ $user->avatar }}" class="rounded-circle avatar-xs"
                                                    alt="">
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">{{ $user->name }}</a></h5>
                                            </td>
                                            {{-- <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
@endsection

@push('scripts')
    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="assets/js/pages/project-overview.init.js"></script>
@endpush

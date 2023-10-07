@extends('layouts.app')

@section('content')
<div class="header bg-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$master['user']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Branch</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$master['branch']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Employee</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$master['employee']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Booking</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$master['category']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">6 Month</h6>
                            <h2 class="text-white mb-0">Earning</h2>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales" class="chart-canvas" data-init={!!$master['earning']!!}
                            data-month={!!$master['monthName']!!}></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Last 6 MOnth</h6>
                            <h2 class="mb-0">Total orders</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-orders" class="chart-canvas" data-init={!!$master['bookingCount']!!}
                            data-month={!!$master['monthName']!!}></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-12 mb-5  mb-3">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Booking</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('booking.index') }}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($master['newBooking'] as $bb)
                            <tr>
                                <td>{{$bb->user->name}}</td>
                                <td>{{$bb->branch->name}}</td>
                                <td>{{$bb->start_time->format('d-m-Y h:m A')}} to {{$bb->end_time->format('h:m A')}}
                                </td>
                                <td class="d-flex">
                                    @can('booking_edit')
                                    @if ($bb->status == 0)

                                    <form action="{{ route('booking.status', ['id'=>$bb->id,'status'=>1]) }}"
                                        method="get">

                                        <button type="button" class="btn btn-sm btn-outline-success btn-icon m-1"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Approved this appointment?"
                                            onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                            <span class="ul-btn__icon"><i class="far fa-thumbs-up"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{ route('booking.status', ['id'=>$bb->id,'status'=>5]) }}"
                                        method="get">

                                        <button data-toggle="tooltip" data-placement="bottom"
                                            title="Rejected this appointment?" type="button"
                                            class="btn btn-sm btn-outline-danger btn-icon m-1"
                                            onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                            <span class="ul-btn__icon"><i class="far fa-thumbs-down"></i></span>
                                        </button>
                                    </form>
                                    @endif
                                    @if ($bb->status == 1)
                                    <form action="{{ route('booking.status', ['id'=>$bb->id,'status'=>2]) }}"
                                        method="get">

                                        <button data-toggle="tooltip" data-placement="bottom"
                                            title="Complete this appointment?" type="button"
                                            class="btn btn-sm btn-outline-success btn-icon m-1"
                                            onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                            <span class="ul-btn__icon"><i class="fas fa-check"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{ route('booking.status', ['id'=>$bb->id,'status'=>3]) }}"
                                        method="get">

                                        <button data-toggle="tooltip" data-placement="bottom"
                                            title="Cancel this appointment?" type="button"
                                            class="btn btn-sm btn-outline-warning btn-icon m-1"
                                            onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                            <span class="ul-btn__icon"><i class="fas fa-times"></i></span>
                                        </button>
                                    </form>
                                    @endif

                                    <a data-toggle="tooltip" data-placement="bottom" title="View Booking?"
                                        class="btn btn-sm btn-outline-primary btn-icon m-1"
                                        href="{{ route('booking.show',$bb) }}">
                                        <span class="ul-btn__icon"><i class="fas fa-print"></i></span>
                                    </a>

                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">

            <div class="card bg-gradient-warning mb-3">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Category</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">{{$master['category']}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                <i class="ni ni-atom"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-xl-4">
            <div class="card bg-gradient-default mb-3">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Service</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">{{$master['sub_category']}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-xl-4">
            <div class="card bg-gradient-danger mb-3">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Offer</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">{{$master['offer']}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                <i class="ni ni-spaceship"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

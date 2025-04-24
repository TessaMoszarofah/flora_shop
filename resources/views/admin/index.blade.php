@extends('layouts.admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-xxl-8 d-flex align-items-stretch">
        <div class="card w-100 overflow-hidden rounded-4">
            <div class="card-body position-relative p-4">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="d-flex align-items-center gap-3 mb-5">
                            <img src="{{asset('assets/images/profileUser.webp')}}" class="rounded-circle bg-grd-info p-1" width="60" height="60" alt="">
                            <div class="">
                                <p class="mb-0 fw-semibold">Welcome back</p>
                                <h4 class="fw-semibold mb-0 fs-4 mb-0">Flora Shop!</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-5">
                            <div class="">
                                @if(isset($todaySales) && $todaySales > 0)
                                <h4 class="mb-1 fw-semibold d-flex align-content-center">{{$formattedTotalSales}}<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                </h4>
                                @else
                                <h4 class="mb-1 fw-semibold d-flex align-content-center">0<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                </h4>
                                @endif
                                <p class="mb-3">Today's Sales</p>
                                <div class="progress mb-0" style="height:5px;">
                                    <div class="progress-bar bg-grd-success" role="progressbar" style="width: {{$salesProgress}}%" aria-valuenow="{{$salesProgress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="vr"></div>
                            <div class="">
                                <h4 class="mb-1 fw-semibold d-flex align-content-center">{{$formattedGrowthRate }} %<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                </h4>
                                <p class="mb-3">Growth Rate</p>
                                <div class="progress mb-0" style="height:5px;">
                                    <div class="progress-bar bg-grd-danger" role="progressbar" style="width: {{$growthProgress}}%" aria-valuenow="{{$growthProgress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <div class="welcome-back-img pt-4">
                            <img src="{{asset('assets/images/gallery/floraa.png')}}" height="180" alt="">
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-1">
                    <div class="">
                        <h5 class="mb-0">{{ $formattedActiveUsers }}</h5>
                        <p class="mb-0">Active Users</p>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container2">
                    <div id="chart1"></div>
                </div>
                <div class="text-center">
                    <p class="mb-0 font-12">{{ $formattedActiveGrowth }} users increased from last month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">{{ $formattedTotalUsers }}</h5>
                        <p class="mb-0">Total Users</p>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container2">
                    <div id="chart2"></div>
                </div>
                <div class="text-center">
                    <p class="mb-0 font-12"><span class="text-success me-1">{{ $formattedUserGrowth }}%</span> from last month</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="text-center">
                    <h6 class="mb-0">Monthly Revenue</h6>
                </div>
                <div class="mt-4" id="chart5"></div>
                <p>Avrage monthly sale for every author</p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="">
                        <h1 class="mb-0 text-primary">68.9%</h1>
                    </div>
                    <div class="d-flex align-items-center align-self-end">
                        <p class="mb-0 text-success">34.5%</p>
                        <span class="material-icons-outlined text-success">expand_less</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="">
                            <h5 class="mb-0">Device Type</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="piechart-legend">
                            <h2 class="mb-1">68%</h2>
                            <h6 class="mb-0">Total Views</h6>
                        </div>
                        <div id="chart6"></div>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span class="material-icons-outlined fs-6 text-primary">desktop_windows</span>Desktop</p>
                            <div class="">
                                <p class="mb-0">35%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span class="material-icons-outlined fs-6 text-danger">tablet_mac</span>Tablet</p>
                            <div class="">
                                <p class="mb-0">48%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span class="material-icons-outlined fs-6 text-success">phone_android</span>Mobile</p>
                            <div class="">
                                <p class="mb-0">27%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-1">
                            <div class="">
                                <h5 class="mb-0">82.7K</h5>
                                <p class="mb-0">Total Clicks</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container2">
                            <div id="chart3"></div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> from last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-1">
                            <div class="">
                                <h5 class="mb-0">68.4K</h5>
                                <p class="mb-0">Total Views</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container2">
                            <div id="chart4"></div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 font-12">35K users increased from last month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h3 class="mb-0">85,247</h3>
                    </div>
                    <div class="flex-grow-0">
                        <p class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_downward</span>23.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Total Accounts</p>
                <div id="chart7"></div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h6 class="mb-0 fw-bold">Campaign Stats</h6>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-primary">
                                <span class="material-icons-outlined text-white">calendar_today</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Campaigns</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">54</p>
                                <p class="mb-0 fw-bold text-success">28%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-success">
                                <span class="material-icons-outlined text-white">email</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Emailed</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">245</p>
                                <p class="mb-0 fw-bold text-danger">15%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-branding">
                                <span class="material-icons-outlined text-white">open_in_new</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Opened</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">54</p>
                                <p class="mb-0 fw-bold text-success">30.5%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-warning">
                                <span class="material-icons-outlined text-white">ads_click</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Clicked</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">859</p>
                                <p class="mb-0 fw-bold text-danger">34.6%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-info">
                                <span class="material-icons-outlined text-white">subscriptions</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Subscribed</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">24,758</p>
                                <p class="mb-0 fw-bold text-success">53%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-danger">
                                <span class="material-icons-outlined text-white">inbox</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Spam Message</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">548</p>
                                <p class="mb-0 fw-bold text-danger">47%</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-3">
                            <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-deep-blue">
                                <span class="material-icons-outlined text-white">visibility</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Views Mails</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">9845</p>
                                <p class="mb-0 fw-bold text-success">68%</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div id="chart8"></div>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="">
                        <h1 class="mb-0">36.7%</h1>
                    </div>
                    <div class="d-flex align-items-center align-self-end gap-2">
                        <span class="material-icons-outlined text-success">trending_up</span>
                        <p class="mb-0 text-success">34.5%</p>
                    </div>
                </div>
                <p class="mb-4">Visitors Growth</p>
                <div class="d-flex flex-column gap-3">
                    <div class="">
                        <p class="mb-1">Cliks <span class="float-end">2589</span></p>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-grd-primary" style="width: 65%"></div>
                        </div>
                    </div>
                    <div class="">
                        <p class="mb-1">Likes <span class="float-end">6748</span></p>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-grd-warning" style="width: 55%"></div>
                        </div>
                    </div>
                    <div class="">
                        <p class="mb-1">Upvotes <span class="float-end">9842</span></p>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-grd-info" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0 fw-bold">Social Leads</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-between gap-4">
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/17.png')}}" width="32" alt="">
                            <p class="mb-0">Facebook</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">55%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#0d6efd", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/18.png')}}" width="32" alt="">
                            <p class="mb-0">LinkedIn</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">67%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#fc185a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/19.png')}}" width="32" alt="">
                            <p class="mb-0">Instagram</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">78%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#02c27a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/20.png')}}" width="32" alt="">
                            <p class="mb-0">Snapchat</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">46%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#fd7e14", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/05.png')}}" width="32" alt="">
                            <p class="mb-0">Google</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">38%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#0dcaf0", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/08.png')}}" width="32" alt="">
                            <p class="mb-0">Altaba</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">15%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#6f42c1", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <img src="{{asset('assets/images/apps/07.png')}}" width="32" alt="">
                            <p class="mb-0">Spotify</p>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">12%</p>
                        </div>
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span data-peity='{ "fill": ["#ff00b3", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-header border-0 p-3 border-bottom">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="">
                        <h5 class="mb-0">New Users</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="user-list p-3">
                    <div class="d-flex flex-column gap-3">
                        @foreach($users as $user)    
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{asset('assets/images/profileUser.webp')}}" width="45" height="45" class="rounded-circle" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ $user->name}}</h6>
                                <p class="mb-0">{{ $user->email }}</p>
                            </div>
                            <div class="form-check form-check-inline me-0">
                                <input class="form-check-input ms-0" type="checkbox">
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent p-3">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">share</i></a>
                    <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">textsms</i></a>
                    <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">email</i></a>
                    <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">attach_file</i></a>
                    <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">event</i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Data Order</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="order-search position-relative my-3">
                    <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                    <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                </div>
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Total</th>
                                <th>Pembeli</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @php $no = 1; @endphp
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('images/produk/' . $item->produk->gambar) }}" class="rounded-circle" width="50" height="50" alt="">
                                        </div>
                                        <p class="mb-0">{{ $item->produk->nama_produk ?? 'Data tidak tersedia'}}</p>
                                    </div>
                                </td>
                                <td>Rp. {{ $item->total }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">{{ $item->status }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
                type: 'area',
                height: 100,
                sparkline: { enabled: true }
            },
            series: [{
                name: 'New Users',
                data: @json($userStats)
            }],
            colors: ['#00E396'],
            stroke: { curve: 'smooth' },
            tooltip: { enabled: false }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
                height: 150,
                type: "radialBar",
            },
            series: [78], // kamu bisa ganti dengan angka dinamis juga
            colors: ["#FF4560"],
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: "70%",
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false
                        },
                        value: {
                            fontSize: '24px',
                            color: '#111',
                            fontWeight: 600
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    });
</script>


@endsection

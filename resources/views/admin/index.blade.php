@extends('admin.copy')
@section('title')
    Admin
@endsection
@section('body-content')
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>Total Clients</strong>
                            </div>
                            <div class="number dashtext-1">{{$users}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{$users}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-contract"></i></div><strong>Total Products</strong>
                            </div>
                            <div class="number dashtext-2">{{$products}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{$products}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Orders</strong>
                            </div>
                            <div class="number dashtext-3">{{$orders}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{$orders}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Delivered</strong>
                            </div>
                            <div class="number dashtext-4">{{$delivered}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{$delivered}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

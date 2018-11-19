@extends('admin.layouts.main')
@section('header')    
@endsection
@section('sidebar-action')
<ul class="nav">
    <li>
        <a href="dashboard.html">
            <i class="pe-7s-graph"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li>
        <a href="{{action('Admin\UserController@user')}}">
            <i class="pe-7s-user"></i>
            <p>User Profile</p>
        </a>
    </li>
    <li class="active">
        <a href="{{action('Admin\ReportController@ShowReportForm')}}">
            <i class="pe-7s-note2"></i>
            <p>List Course</p>
        </a>
    </li>
    <li>
        <a href="typography.html">
            <i class="pe-7s-news-paper"></i>
            <p>Typography</p>
        </a>
    </li>
    <li>
        <a href="icons.html">
            <i class="pe-7s-science"></i>
            <p>Icons</p>
        </a>
    </li>
    <li>
        <a href="maps.html">
            <i class="pe-7s-map-marker"></i>
            <p>Maps</p>
        </a>
    </li>
    <li>
        <a href="notifications.html">
            <i class="pe-7s-bell"></i>
            <p>Notifications</p>
        </a>
    </li>
    <li class="active-pro">
        <a href="upgrade.html">
            <i class="pe-7s-rocket"></i>
            <p>Upgrade to PRO</p>
        </a>
    </li>
</ul>
@endsection
@section('dashbord-content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                    <div style="width: 500px; height: 500px;">
                            {!! Mapper::render() !!}
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection

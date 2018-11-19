@extends('admin.layouts.main')
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
        <a href="{{action('Admin\MapController@location')}}">
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
                <center>
                    <div class="card w-75">
                        <h5 class="card-header w-20" style="background-color:#0082C8;">List Course</h5>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <select name="course" id="course" class="form-control">
                                        {{-- <option value="0">:: กรุณาเลือกจังหวัด ::</option> --}}
                                        @if (!empty($province))
                                        <option value="0">:: กรุณาเลือกจังหวัด ::</option>
                                            @foreach ($province as $d)
                                            <option value={{$d->province}}>{{$d->province}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
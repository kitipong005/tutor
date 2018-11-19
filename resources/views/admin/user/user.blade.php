<style>
    #pic-icon{
        width: 25px;
        height: 25px;
    }
    tr td{
        text-align: center;
    }tr th{
        text-align: center;
    }
</style>

@extends('admin.layouts.main')
@section('sidebar-action')
<ul class="nav">
        <li >
            <a href="dashboard.html">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="active">
        <a href="{{action('Admin\UserController@user')}}">
                <i class="pe-7s-user"></i>
                <p>User Profile</p>
            </a>
        </li>
        <li>
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
                    <div class="card">
                        <div class="header">
                            <h2 class="title">List User</h2>
                        </div>
                        <div class="content">
                            <form>          
                            <table class="table">
                                <thead  class="thead-light">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">FirstName</th>
                                    <th scope="col">LastName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Province</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data); $i++)
                                    <tr>
                                    <th scope="row">{{$i+1}}</th>
                                        <td>{{$data[$i]->firstname}}</td>
                                        <td>{{$data[$i]->lastname}}</td>
                                        <td>{{$data[$i]->email}}</td>
                                        <td>{{$data[$i]->province}}</td>
                                        <td><button type="button" class="btn-warning"><a href=""><img src="{{ asset('img/pencil.png') }}" alt="" id="pic-icon"></a></button>
                                            <button type="button" class="btn-danger"><a href=""><img src="{{ asset('img/bin.png') }}" alt="" id="pic-icon"></a></button>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                                </table>
                            </form>
                            <button type="button" class="btn-primary"><a href="{{route('admin.adduser')}}"><img src="{{asset('img/add.ico')}}" alt="" id="pic-icon"> AddUser</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
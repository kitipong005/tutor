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
                <a href="#">
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
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                            <div class="header">
                                <h2 class="title">Add User</h2>
                            </div>
                            <div class="content">
                                    <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Register</div>
                                    
                                                    <div class="panel-body">
                                                        <form class="form-horizontal" method="POST" action="{{ action('Admin\UserController@register') }}">
                                                            {{ csrf_field() }}
                                    
                                                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                                <label for="firstname" class="col-md-4 control-label">FirstName</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input id="name" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                    
                                                                    @if ($errors->has('firstname'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('firsttname') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                                    <label for="name" class="col-md-4 control-label">LastName</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="name" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                                        
                                                                        @if ($errors->has('lastname'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('lastname') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                    
                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    
                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                <label for="password" class="col-md-4 control-label">Password</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input id="password" type="password" class="form-control" name="password" required>
                                    
                                                                    @if ($errors->has('password'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                                                    <label for="name" class="col-md-4 control-label">Province</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="name" type="text" class="form-control" name="province" value="{{ old('province') }}" required autofocus>
                                        
                                                                        @if ($errors->has('province'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('province') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Register
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
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
    @endsection
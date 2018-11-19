@extends('layouts.main')
@section('content')
<div class="container">
    <div class="w3-row-padding w3-center w3-padding-64" id="pricing">
        <h2 style="text-align: left;"><i class="fa fa-cogs"></i> ลงทะเบียนเรียน</h2>
        <p style="text-align: left;margin-top:-1%;">ระบบลงทะเบียนนักเรียน</p>
        <hr>
        <div class="w3-quarter w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                @if (Session::has('message'))
                <div class="alert alert-danger text-center">{{ Session::get('message') }}</div>
                @endif
                <li style="background-color:#228B22;">
                    <p class="w3-xlarge" style="color:#fff;"><i class="fa fa-users"></i>&nbsp;&nbsp;ลงทะเบียน</p>
                </li>
                <form action="{{action('RegisterController@ShowRegisForm')}}" method="GET">
                    <li class="w3-padding-16"><b>คอร์สเรียน : </b>
                        @if($term != null)
                        <select name="course" id="course" class="form-control">
                            <option value="0">:: กรุณาเลือกคอร์สเรียน ::</option>
                            @foreach ($term as $d)
                            <option value={{$d->term_id}}>{{$d->detail}}</option>
                            @endforeach
                        </select>
                        @endif
                    </li>
                    <li class="w3-theme-l5 w3-padding-24" style="background-color:#dbccb9;">
                        <button button="submit" class="w3-button w3-padding-large w3-hover-white" style="background-color:#228B22;color:white;">
                            ลงทะเบียนนักเรียน</a></button>
                    </li>
                </form>

            </ul>
        </div>

        <div class="w3-quarter w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li style="background-color:#FF8C00;">
                    <p class="w3-xlarge" style="color:#fff;"><i class="fa fa-file-text"></i>&nbsp;&nbsp;รายชื่อนักเรียน</p>
                </li>

                <form action="{{action('StdController@ShowNameStdForm')}}" method="GET">
                    {{ csrf_field() }}
                    <li class="w3-padding-16"><b>คอร์สเรียน : </b>
                        @if($term != null)
                        <select name="course" id="course" class="form-control">
                            <option value="0">:: กรุณาเลือกคอร์สเรียน ::</option>
                            @foreach ($term as $d)
                            <option value={{$d->term_id}}>{{$d->detail}}</option>
                            @endforeach
                        </select>
                        @endif
                    </li>
                    <li class="w3-theme-l5 w3-padding-24" style="background-color:#dbccb9;">
                        <button button="submit" class="w3-button w3-padding-large w3-hover-white" style="background-color:#228B22;color:white; width:160px; heigh:46px;">ดูรายชื่อ</a></button>
                    </li>
                </form>
            </ul>
        </div>

        <div class="w3-quarter w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li style="background-color:#008B8B;">
                    <p class="w3-xlarge" style="color:#fff;"><i class="fa fa-book"></i>&nbsp;&nbsp;รายงานชำระเงิน</p>
                </li>
                <form action="{{action('StdController@ShowNameStdForm_Conf')}}" method="GET">
                    {{ csrf_field() }}
                    <li class="w3-padding-16"><b>คอร์สเรียน : </b>
                        @if($term != null)
                        <select name="course" id="course" class="form-control">
                            <option value="0">:: กรุณาเลือกคอร์สเรียน ::</option>
                            @foreach ($term as $d)
                            <option value={{$d->term_id}}>{{$d->detail}}</option>
                            @endforeach
                        </select>
                        @endif
                    </li>
                    <li class="w3-theme-l5 w3-padding-24" style="background-color:#dbccb9;">
                        <button button="submit" class="w3-button w3-padding-large w3-hover-white" style="background-color:#228B22;color:white; width:160px; heigh:46px;">ยืนยันรายชื่อ</a></button>
                    </li>
                </form>
            </ul>
        </div>

        <div class="w3-quarter w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li style="background-color:#ffde2c;">
                    <p class="w3-xlarge" style="color:#fff;"><i class="fa fa-book"></i>&nbsp;&nbsp;นักเรียน</p>
                </li>
                <form action="{{action('StdController@ShowNameStdForm')}}" method="GET">
                    <li class="w3-padding-16"><b>แก้ไขรายชื่อ : </b>
                        @if($term != null)
                        <select name="course" id="course" class="form-control">
                            <option value="0">:: กรุณาเลือกคอร์สเรียน ::</option>
                            @foreach ($term as $d)
                            <option value={{$d->term_id}}>{{$d->detail}}</option>
                            @endforeach
                        </select>
                        @endif
                    </li>
                    <li class="w3-theme-l5 w3-padding-24" style="background-color:#dbccb9;">
                        <button button="submit" class="w3-button w3-padding-large w3-hover-white" style="background-color:#228B22;color:white; width:160px; heigh:46px;">ยืนยันรายชื่อ</a></button>
                    </li>
                </form>
            </ul>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
<script>
    alert('ลงทะเบียนนักเรียนสำเร็จ !!!');
</script>
@endif
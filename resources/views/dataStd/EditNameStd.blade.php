@extends('layouts.main')
@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid mt-3">
        <div class="container">
            @if (Session::has('fails'))
            <div class="alert alert-danger text-center">{{ Session::get('fails') }}</div>
            @endif

            @foreach ($term_detail as $d)

            <h2><i><img src="{{ asset('img/User.png') }}" alt="" /></i>&nbsp;&nbsp;แก้ไขข้อมูลนักเรียน {{$d->detail}}</h2><br>

            @endforeach
            <h4 style="color:#e60000;">:: ส่วนข้อมูลนักเรียน ::</h4>
            <br>
            <form action="{{action('StdController@update_data_std')}}" method="POST" nctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                @foreach ($data as $d)
                <div class="form-inline ml-1">
                    <div class="form-group mr-2">
                        <label for="FirstName_Std"><b>ชื่อ :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="FirstName_Std" name="FirstName_Std" value="{{$d->FirstName_Std}}">
                    </div>

                    <div class="form-group mr-2">
                        <label for="LastName_Std"><b>นามสกุล :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="LastName_Std" name="LastName_Std" value="{{$d->LastName_Std}}">
                    </div>
                    <div class="form-group">
                        <label for="NickName_Std"><b>ชื่อเล่น :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="NickName_Std" name="NickName_Std" value="{{$d->NickName_Std}}">
                    </div>
                </div>
                <br />
                <div class="form-check-label">
                    <label for="Gender_Std"><b>เพศ : &nbsp;&nbsp;</b></label>
                    <label class="form-check-label">
                        @if ($d->Gender_Std == 'ชาย')
                        <input type="radio" name="Gender_Std" value="ชาย" checked> ชาย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="Gender_Std" value="หญิง"> หญิง &nbsp;
                        @elseif($d->Gender_Std == 'หญิง')

                        <input type="radio" name="Gender_Std" value="ชาย"> ชาย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="Gender_Std" value="หญิง" checked> หญิง &nbsp;

                        @else

                        <input type="radio" name="Gender_Std" value="ชาย"> ชาย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="Gender_Std" value="หญิง"> หญิง &nbsp;

                        @endif
                    </label>
                </div>
                <br />
                <div class="form-inline ">

                    <div class="form-group mr-2">
                        <label for="Age_Std"><b>อายุ : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Age_Std" name="Age_Std" size="10" value="{{$d->Age_Std}}">
                    </div>

                    <div class="form-group mr-2">
                        <label for="Birth_Std"><b>เกิดวันที่ : &nbsp;&nbsp;</b></label>
                        <input type="date" class="form-control" id="Birth_Std" name="Birth_Std" value="{{$d->Birth_Std}}">
                    </div>

                    <div class="form-group">
                        <label for="School_Std"><b>มาจากโรงเรียน : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" size="35" id="School_Std" name="School_Std" value="{{$d->School_Std}}">
                    </div>
                </div>
                <br />
                <div class="form-inline ">
                    <div class="form-group mr-2">
                        <label for="Class_Std"><b>กำลังเรียนอยู่ชั้น : &nbsp;&nbsp;</b></label>
                        <select name="Class_Std" class="form-control">
                            <option value="{{$d->Class_Std}}" selected>{{$d->Class_Std}}</option>
                            <option value="ป.3">ป.3</option>
                            <option value="ป.4">ป.4</option>
                            <option value="ป.5">ป.5</option>
                            <option value="ป.6">ป.6</option>
                            <option value="ม.1">ม.1</option>
                            <option value="ม.2">ม.2</option>
                            <option value="ม.3">ม.3</option>
                            <option value="ม.4">ม.4</option>
                            <option value="ม.5">ม.5</option>
                            <option value="ม.6">ม.6</option>
                        </select>
                    </div>

                    <div class="form-group  mr-2">
                        <label for="Major_Std"><b>สาย : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Major_Std" name="Major_Std" value="{{$d->Major_Std}}">
                    </div>

                    <div class="form-group  mr-2">
                        <label for="Email_Std"><b>E-mail : &nbsp;&nbsp;</b></label>
                        <input type="email" class="form-control" id="Email_Std" name="Email_Std" size="39" value="{{$d->Email_Std}}">
                    </div>
                </div>
                <br />
                <div class="form-inline ">

                    <div class="form-group mr-2">
                        <label for="Tel_Std"><b>เบอร์โทรศัพท์ : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Tel_Std" name="Tel_Std" value="{{$d->Tel_Std}}">
                    </div>

                    <div class="form-group">
                        <label for="Line_Std"><b>Line ID : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Line_Std" name="Line_Std" value="{{$d->Line_Std}}">
                    </div>
                </div>
                <br />
                <div class="form-inline ">
                    <div class="form-group">
                        <label for="Address_Std"><b>ที่อยู่ปัจจุบัน : &nbsp;&nbsp;</b></label>
                        <textarea class="form-control" id="Address_Std" name="Address_Std" value="{{$d->Address_Std}}">

                                </textarea>
                    </div>
                </div>
                <br />
                <!--ส่วนของผู้ปกครอง-->
                <h4 style="color:#e60000;">:: ส่วนข้อมูลผู้ปกครอง ::</h4>
                <br>
                <div class="form-inline ">
                    <div class="form-group mr-2">
                        <label for="FirstName_Par"><b>ชื่อ :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="FirstName_Par" name="FirstName_Par" value="{{$d->FirstName_Par}}">
                    </div>
                    <div class="form-group mr-2">
                        <label for="LastName_Par"><b>นามสกุล :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="LastName_Par" name="LastName_Par" value="{{$d->LastName_Par}}">
                    </div>
                    <div class="form-group">
                        <label for="Email_Par"><b>E-mail :&nbsp;&nbsp;</b></label>
                        <input type="email" class="form-control" size="30" id="Email_Par" name="Email_Par" value="{{$d->Email_Par}}">
                    </div>
                </div>
                <br />
                <div class="form-inline ">
                    <div class="form-group">
                        <label for="Tel_Par"><b>เบอร์โทรศัพท์ :&nbsp;&nbsp; </b></label>
                        <input type="text" class="form-control" id="Tel_Par" name="Tel_Par" value="{{$d->Tel_Par}}">
                    </div>
                    &nbsp;&nbsp;
                    <div class="form-group">
                        <label for="Line_Par"><b>Line ID :&nbsp;&nbsp; </b></label>
                        <input type="text" class="form-control" id="Line_Par" name="Line_Par" value="{{$d->Line_Par}}">
                    </div>
                </div>
                <br />
                <div class="container">
                    <input type="hidden" class="form-control" id="Term_ID" name="Term_ID" value="{{$term}}">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$d->id}}">
                    <input type="hidden" class="form-control" id="User_id" name="User_id" value="{{Session::get('data_user')[0]->id}}">
                    <input type="hidden" class="form-control" id="province" name="province" value="{{Session::get('data_user')[0]->province}}">
                </div>
                @endforeach
                <center><button type="submit" class="btn btn-primary" style="background-color:#0f9921;" value="">ยืนยันการแก้ไขข้อมูล</button></center>
            </form>
        </div>
    </div>
</div>
@endsection
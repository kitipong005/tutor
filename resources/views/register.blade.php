@extends('layouts.main')
@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid mt-3">
        <div class="container">
            @if (Session::has('fails'))
            <div class="alert alert-danger text-center">{{ Session::get('fails') }}</div>
            @endif

            @foreach ($term_detail as $d)

            <h2><i><img src="{{ asset('img/User.png') }}" alt="" /></i>&nbsp;&nbsp;ลงทะเบียนนักเรียน {{$d->detail}}</h2><br>

            @endforeach
            <h4 style="color:#e60000;">:: ส่วนข้อมูลนักเรียน ::</h4>
            <br>
            <form action="{{action('RegisterController@register')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-inline ml-1">
                    <div class="form-group mr-2">
                        <label for="FirstName_Std"><b>ชื่อ :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="FirstName_Std" name="FirstName_Std">
                    </div>

                    <div class="form-group mr-2">
                        <label for="LastName_Std"><b>นามสกุล :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="LastName_Std" name="LastName_Std">
                    </div>

                    <div class="form-group">
                        <label for="NickName_Std"><b>ชื่อเล่น :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="NickName_Std" name="NickName_Std">
                    </div>
                </div>
                <br />
                <div class="form-check-label">
                    <label for="Gender_Std"><b>เพศ : &nbsp;&nbsp;</b></label>
                    <label class="form-check-label">
                        <input type="radio" name="Gender_Std" value="ชาย"> ชาย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="Gender_Std" value="หญิง"> หญิง &nbsp;
                    </label>
                </div>
                <br />
                <div class="form-inline ">

                    <div class="form-group mr-2">
                        <label for="Age_Std"><b>อายุ : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Age_Std" name="Age_Std" size="10">
                    </div>

                    <div class="form-group mr-2">
                        <label for="Birth_Std"><b>เกิดวันที่ : &nbsp;&nbsp;</b></label>
                        <input type="date" class="form-control" id="Birth_Std" name="Birth_Std">
                    </div>


                    <div class="form-group">
                        <label for="School_Std"><b>มาจากโรงเรียน : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" size="35" id="School_Std" name="School_Std">
                    </div>
                </div>
                <br />
                <div class="form-inline ">

                    <div class="form-group mr-2">
                        <label for="Class_Std"><b>กำลังเรียนอยู่ชั้น : &nbsp;&nbsp;</b></label>
                        <select name="Class_Std" class="form-control">
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
                        <input type="text" class="form-control" id="Major_Std" name="Major_Std">
                    </div>

                    <div class="form-group  mr-2">
                        <label for="Email_Std"><b>E-mail : &nbsp;&nbsp;</b></label>
                        <input type="email" class="form-control" id="Email_Std" name="Email_Std" size="39">
                    </div>
                </div>
                <br />

                <div class="form-inline ">

                    <div class="form-group mr-2">
                        <label for="Tel_Std"><b>เบอร์โทรศัพท์ : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Tel_Std" name="Tel_Std">
                    </div>

                    <div class="form-group">
                        <label for="Line_Std"><b>Line ID : &nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="Line_Std" name="Line_Std">
                    </div>
                </div>
                <br />

                <div class="form-inline ">
                    <div class="form-group">
                        <label for="Address_Std"><b>ที่อยู่ปัจจุบัน : &nbsp;&nbsp;</b></label>
                        <textarea class="form-control" id="Address_Std" name="Address_Std">

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
                        <input type="text" class="form-control" id="FirstName_Par" name="FirstName_Par">
                    </div>
                    <div class="form-group mr-2">
                        <label for="LastName_Par"><b>นามสกุล :&nbsp;&nbsp;</b></label>
                        <input type="text" class="form-control" id="LastName_Par" name="LastName_Par">
                    </div>
                    <div class="form-group">
                        <label for="Email_Par"><b>E-mail :&nbsp;&nbsp;</b></label>
                        <input type="email" class="form-control" size="30" id="Email_Par" name="Email_Par">
                    </div>
                </div>
                <br />

                <div class="form-inline ">
                    <div class="form-group">
                        <label for="Tel_Par"><b>เบอร์โทรศัพท์ :&nbsp;&nbsp; </b></label>
                        <input type="text" class="form-control" id="Tel_Par" name="Tel_Par">
                    </div>
                    &nbsp;&nbsp;
                    <div class="form-group">
                        <label for="Line_Par"><b>Line ID :&nbsp;&nbsp; </b></label>
                        <input type="text" class="form-control" id="Line_Par" name="Line_Par">
                    </div>
                </div>
                <br />
                <!--course_1 //==============================================================================================-->
                <h4 style="color:#e60000;">:: ส่วนข้อมูลคอร์สเรียน ::</h4>
                <br>
                <div class="row">
                    <div class="col-8">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="course_1"><b>คอร์สเรียนที่ 1 : &nbsp;&nbsp;</b></label>
                                <select name="course_1" id="course_1" class="form-control" onchange="extract_price1();">
                                    <option value="0">:: กรุณาเลือกคอร์สเรียน ::&nbsp;&nbsp;</option>

                                    @foreach ($subject as $sj)

                                    <option value="{{$sj->price}},{{$sj->id}}">{{$sj->detail}}</option>

                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" id="price1" name="price1" value="0">
                                <input type="hidden" class="form-control" id="chk1" name="chk1">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!--course_2 //==============================================================================================-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="course_3"><b>คอร์สเรียนที่ 2 : &nbsp;&nbsp;</b></label>
                                <select name="course_2" id="course_2" class="form-control" onchange="extract_price2();">
                                    <option value="0">:: กรุณาเลือกคอร์สเรียน ::&nbsp;&nbsp;</option>
                                    @foreach ($subject as $sj)
                                    <option value="{{$sj->price}},{{$sj->id}}">{{$sj->detail}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" id="price2" name="price2" value="0">
                                <input type="hidden" class="form-control" id="chk2" name="chk2">

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!--course_3 //==============================================================================================-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="course_3"><b>คอร์สเรียนที่ 1 : &nbsp;&nbsp;</b></label>
                                <select name="course_3" id="course_3" class="form-control" onchange="extract_price3();">
                                    <option value="0">:: กรุณาเลือกคอร์สเรียน ::&nbsp;&nbsp;</option>
                                    @foreach ($subject as $sj)
                                    <option value="{{$sj->price}},{{$sj->id}}">{{$sj->detail}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" id="price3" name="price3" value="0">
                                <input type="hidden" class="form-control" id="chk3" name="chk3">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- ส่วนการชำระเงิน //==============================================================================================-->
                <h4 style="color:#e60000;">:: ส่วนการชำระเงิน ::</h4>
                <br>
                <div class="form-check-label">
                    <label for="std"><b>เด็กเก่า : </b></label>
                    <label class="form-check-label">
                        <input type="checkbox" name="std" id="std" value="200" onclick="student()"> ลดเพิ่ม 200
                        บาท&nbsp;
                    </label>
                </div>
                <br>
                <!-- ราคาที่ต้องชำระ -->
                <div class="row">
                    <div class="col-5">
                        <div class="form-group form-inline">
                            <label for="c_1"><b>ราคารวมที่ต้องชำระ : &nbsp;&nbsp;</b></label>
                            <input type="text" class="form-control" id="c_1" name="c_1" readonly>
                            <input type="hidden" class="form-control" id="oldc_1" name="oldc_1" value="0">
                            <input type="hidden" class="form-control" id="oldc_2" name="oldc_2" value="0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group form-inline">
                            <label for="c_2"><b>ราคาชำระพิเศษ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="text" class="form-control" id="c_2" name="c_2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group form-inline">
                            <label for="c_3"><b>จำนวนที่ชำระทั้งสิ้น : &nbsp;&nbsp;</b></label>
                            <input type="text" class="form-control" id="c_3" name="c_3">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ThaiMoney" name="ThaiMoney" placeholder="กรุณากรอกจำนวนเงินภาษาไทย">
                        </div>
                    </div>
                </div>
                <!-- ชำระด้วย -->
                <h5 style="color:#e60000;">* ชำระเงินด้วย *</h5>
                <div class="row">
                    <div class="col-sm-3 bank-group" data-pay="money">
                        <div class="checkbox">
                            <label for="Pay"><b>ชำระด้วยเงินสด : &nbsp; &nbsp;</b></label>
                            <input type="radio" name="Pay" id="Pay" value="เงินสด" checked>&nbsp;
                        </div>
                    </div>

                    <div class="col-sm-4 bank-group" data-pay="credit">
                        <div class="checkbox">
                            <label for="credit"><b>ชำระด้วยบัตรเครดิต : &nbsp; &nbsp;</b></label>
                            <input type="radio" name="Pay" id="Pay" value="บัตรเครดิต">&nbsp;<br><br>
                            <div class="form-group form-inline">
                                <label for="ID_Card"><b>ID Card : </b></label>
                                <input type="text" class="form-control" id="ID_Card" name="ID_Card">
                            </div>
                            <br />
                            <div class="form-group form-inline">
                                <label for="ID_Slip"><b>ID Slip : </b></label>&nbsp;
                                <input type="text" class="form-control" id="ID_Slip" name="ID_Slip">
                            </div>
                            <br />
                            <div class="form-group form-inline">
                                <label for="Credit_Bank"><b>ธนาคาร : </b></label>&nbsp;
                                <select name="Credit_Bank" id="Credit_Bank" class="form-control">
                                    <option value="">:: กรุณาเลือกธนาคาร ::</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                    <option value="ธนาคารกรุงศรี">ธนาคารกรุงศรี</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                                    <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                    <option value="เคทีซี">เคทีซี</option>
                                    <option value="เทสโก้ โลตัส">เทสโก้ โลตัส</option>
                                    <option value="อิออน">อิออน</option>
                                    <option value="ยูโอบี">ยูโอบี</option>
                                    <option value="สแตนดาร์ดชาร์เตอร์">สแตนดาร์ดชาร์เตอร์</option>
                                    <option value="ซิตี้แบงก์">ซิตี้แบงก์</option>
                                    <option value="ธนาคารไอซีบีซี">ธนาคารไอซีบีซี</option>
                                    <option value="เซ็นทรัล">เซ็นทรัล</option>
                                    <option value="ซีไอเอ็มบี ไทย">ซีไอเอ็มบี ไทย</option>ส
                                    <option value="อเมริกัน เอ็กซ์เพรส">อเมริกัน เอ็กซ์เพรส</option>
                                </select>
                            </div><br><br>
                        </div>
                    </div>


                    <div class="col-sm-5 bank-group" data-pay="ebank">

                        <div class="checkbox">
                            <label for="transfer"><b>ชำระด้วยโอนเงิน : &nbsp; &nbsp;</b></label>
                            <input type="radio" name="Pay" id="Pay" value="โอนเงิน">&nbsp;<br><br>
                        </div>
                        <div class="form-group form-inline">
                            <label for="Amount"><b>จำนวนเงิน : </b></label>
                            <input type="text" class="form-control" id="Amount" name="Amount">
                        </div><br>

                        <div class="checkbox ml-3">
                            <input type="radio" name="Bank" value="ธนาคารไทยพาณิชย์">&nbsp;<img src="{{ asset('img/scb.jpg') }}"
                                alt="IMG" style="width:120px; height:64px;">&nbsp;&nbsp;<img src="{{ asset('img/scb-1.png') }}"
                                alt="IMG" style="width:128px; height:64px;"><br><br>
                            <input type="radio" name="Bank" value="ธนาคารกสิกรไทย">&nbsp;<img src="{{ asset('img/kb.jpg') }}"
                                alt="IMG" style="width:120px; height:64px;">&nbsp;&nbsp;<img src="{{ asset('img/kb-1.png') }}"
                                alt="IMG" style="width:128px; height:64px;"><br><br>
                            <input type="radio" name="Bank" value="ธนาคารกรุงศรี">&nbsp;<img src="{{ asset('img/ksb.png') }}"
                                alt="IMG" style="width:120px; height:64px;">&nbsp;&nbsp;<img src="{{ asset('img/ksb-1.png') }}"
                                alt="IMG" style="width:128px; height:64px;"><br><br>
                            <input type="radio" name="Bank" value="ธนาคารกรุงเทพ">&nbsp;<img src="{{ asset('img/bkk.jpg') }}"
                                alt="IMG" style="width:120px; height:64px;">&nbsp;&nbsp;<img src="{{ asset('img/bkk-1.png') }}"
                                alt="IMG" style="width:128px; height:64px;"><br><br>
                            <input type="radio" name="Bank" value="ธนาคารออมสิน">&nbsp;<img src="{{ asset('img/gsb.jpg') }}"
                                alt="IMG" style="width:120px; height:64px;">&nbsp;&nbsp;<img src="{{ asset('img/gsb-1.png') }}"
                                alt="IMG" style="width:128px; height:64px;"><br><br>
                        </div>
                    </div><br><br>
                    <div class="container">
                        <div class="form-group form-inline">
                            <label for="note">*หมายเหตุ :</label>
                            <textarea class="form-control" rows="3" id="Note" name="Note"></textarea>
                        </div><br><br>
                        <input type="hidden" class="form-control" id="Status" name="Status" value="no">
                        <input type="hidden" class="form-control" id="Term_ID" name="Term_ID" value="{{$term}}">
                        <input type="hidden" class="form-control" id="User_id" name="User_id" value="{{Session::get('data_user')[0]->id}}">
                        <input type="hidden" class="form-control" id="province" name="province" value="{{Session::get('data_user')[0]->province}}">
                    </div>
                </div>

                <center><button type="submit" class="btn btn-primary" style="background-color:#e60000;" value="ลงทะเบียนเรียน">ลงทะเบียนเรียน</button></center>


            </form>

        </div>
    </div>
</div>
@endsection
<!--My script //==============================================================================================-->
@section('scripts')
<script>
        $(function () {
    
            function ch() {
                if ($('input[name="Pay"]:checked').prop('checked')) {
                    let parent = $('input[name="Pay"]:checked').parentsUntil('[data-pay]').parent()
                    console.log($("[data-pay]").not(parent).find('input:not(#Pay),select').each(function () {
                        $(this).val("")
                        if ($(this).prop('checked', false))
                            $(this).attr('disabled', true)
                    }))
                    parent.find('input,select').each(function () {
                        $(this).val("")
                        $(this).attr('disabled', false)
                    })
                }
            }
            $('input[name="Pay"]').change(ch)
            ch()
        });
    
        function student() {
            var x = document.getElementById("std").value;
            var y = document.getElementById("c_1").value;
            var checkBox = document.getElementById("std");
            if (checkBox.checked == true) {
                var sum = parseInt(y) - parseInt(x);
            } else {
                var sum = parseInt(y) + 200.00;
            }
            document.getElementById("c_1").value = sum;
        }
    
    
        function extract_price1() {
            let v = document.getElementById("course_1").value;
            let chk = document.getElementById("chk1").value;
            if (v != 0) {
                if (chk != 1) {
                    let price = v.split(",");
                    chk = 1;
                    document.getElementById("price1").value = price[0];
                    document.getElementById("chk1").value = chk;
                    document.getElementById("c_1").value = price[0];
                } else {
    
                    let price = v.split(",");
                    document.getElementById("price1").value = price[0];
                    document.getElementById("chk1").value = chk;
                    document.getElementById("c_1").value = price[0];
                }
    
            } else {
                document.getElementById("price1").value = 0;
                document.getElementById("chk1").value = 0;
                document.getElementById("c_1").value = 0;
            }
        }
    
        function extract_price2() {
            let v = document.getElementById("course_2").value;
            let old = document.getElementById("c_1").value;
            let chk = document.getElementById("chk2").value;
            let old2 = document.getElementById("oldc_1").value;
            //console.log(chk);
            //----- เลือกวิชา ----------------
            if (v != 0) {
                if (chk != 1) {
                    let price = v.split(",");
                    chk = 1;
                    var sum = parseInt(price[0]) + parseInt(old);
                    document.getElementById("price2").value = price[0];
                    document.getElementById("c_1").value = sum;
                    document.getElementById("chk2").value = chk;
                    document.getElementById("oldc_1").value = old;
                } else {
    
                    let price = v.split(",");
                    var sum = parseInt(price[0]) + parseInt(old2);
                    document.getElementById("price2").value = price[0];
                    document.getElementById("c_1").value = sum;
                }
            }
            //----- ไม่เลือกวิชา ----------------
            else {
                chk = 0;
                document.getElementById("c_1").value = old2;
                document.getElementById("price2").value = 0;
                document.getElementById("chk2").value = chk;
                document.getElementById("oldc_1").value = 0;
            }
        }
    
        function extract_price3() {
            let v = document.getElementById("course_3").value;
            let old = document.getElementById("c_1").value;
            let chk = document.getElementById("chk3").value;
            let old2 = document.getElementById("oldc_2").value;
            //console.log(chk);
            //----- เลือกวิชา ----------------
            if (v != 0) {
                //----select first -------
                if (chk != 1) {
                    let price = v.split(",");
                    chk = 1;
                    var sum = parseInt(price[0]) + parseInt(old);
                    document.getElementById("price3").value = price[0];
                    document.getElementById("c_1").value = sum;
                    document.getElementById("chk3").value = chk;
                    document.getElementById("oldc_2").value = old;
                } else {
    
                    let price = v.split(",");
                    var sum = parseInt(price[0]) + parseInt(old2);
                    document.getElementById("price3").value = price[0];
                    document.getElementById("c_1").value = sum;
                }
            }
            //----- ไม่เลือกวิชา ----------------
            else {
                chk = 0;
                document.getElementById("c_1").value = old2;
                document.getElementById("price3").value = 0;
                document.getElementById("chk3").value = chk;
                document.getElementById("oldc_2").value = 0;
            }
        }
    </script>
@endsection


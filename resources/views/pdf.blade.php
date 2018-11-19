
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
            /* @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
            }
            @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        } */
     
            body {
                font-family: "thsarabunnew";
                font-size: 18px;
            }
            /* table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            } */
            table {
                width: 100%;
            }
        #tb-c{
            border: 1px solid black;
            border-collapse: collapse;
        }
        #tb-b{
            border: 1px solid black;
        }
        #tb-b-c{
            border-bottom: 1px solid dotted;
            border-collapse: collapse;
        }
        </style>
</head>
<body>
    
    <table>
            <tr>
                    <th style="width:20%"><img src="{{ asset('img/LOGO.jpg') }}" alt="IMG" style="width:150px; height:120px;" ></th>
                    <th align='center' valign="top"><h3>ใบเสร็จกำกับภาษี/ใบกำกับภาษี <br>
                    RECEIPT/TAX INVOICE</h3></th>
                    <th style="width:15%" valign="top">วันที่ {{$dates}}</th>
      
             </tr>
            {{-- <tr>
              <th><img src="{{ public_path('img/LOGO.jpg') }}" alt="IMG" style="width:170px; height:150px;" ></th>

            </tr> --}}
     </table>
     <table>
            <tr>
                <th>ชื่อ/สกุล (ลูกค้า) {{$fname}}   {{$lname}}</th>         
            </tr>
    </table>
    <table id="tb-c">
            <tr id="tb-c">
                <th align='center' style="width:25%" id="tb-c">รหัสวิชา<br>
                    CODE COURSE
                </th>
                <th align='center' style="width:60%" id="tb-c">รายการ<br>
                    DESCRIPTION
                </th>
                <th align='center' id="tb-c">จำนวนเงิน<br>
                    AMOUNT
                </th>              
            </tr>
            <tr>
                <td align='center' valign="top" style="widtd:25%" style="height:30%;" id="tb-c">
                    @foreach ($course_n as $c => $v)
                    @if ($course_n[$c] != 0)
                    {{$course_n[$c]}}<br>
                    @endif
                    @endforeach
                </td>
                <td align='left' valign="top"style="widtd:60%; padding-left:10px; height:15%;" id="tb-c">
                        @foreach ($course_n as $c => $v)
                        @if ($course_n[$c] != 0)
                        {{$course_d[$c]}}<br>
                        @endif
                        @endforeach
                </td>
                <td align='center'  valign="top"style="height:30%;" id="tb-c">
                    @foreach ($course_n as $c => $v)
                    @if ($course_n[$c] != 0)
                    {{$course_p[$c]}}<br>
                    @endif
                    @endforeach
                </td> 
            </tr>

    </table>
    <table id="tb-c">
            <tr>
                <th rowspan="3" align="left" valign="top" style="width:60%; padding-left:10px;">{{$thai}}</th> 
                <th style="width:25%" align="right" id="tb-c">รวมเงิน&nbsp;&nbsp;</th>
                <td id="tb-c" align="center">{{$sum}}</td>
            </tr>
            <tr>
                <th align="right" id="tb-c">ส่วนลด&nbsp;&nbsp;</th>
                <td id="tb-c" align="center">{{$std}}</td>
            </tr>
            <tr>
                <th align="right" id="tb-c">จำนวนเงินทั้งหมด&nbsp;&nbsp;</th>
                <td id="tb-c" align="center">{{$allsum}}</td>
            </tr>
    </table>
    <br>
    <table>
        <td>
          <table id="tb-b">
            <tr>
                   <th>ได้รับเงินแล้ว</th>
                   <td></td>
                   <td></td>
            </tr>
            <tr >
                    <td id="tb-b-c"></td>
                    <td id="tb-b-c">วิธีการชำระเงิน</td>
                    <td id="tb-b-c">{{$pay}}</td>
                    
    
            </tr>
            @if ($pay == 'บัตรเครดิต')
                <tr>
                    <th>*ชำระด้วยบัตรเครดิต</th>
                    <td>เลขบัตร</td>
                    <td>{{$id_card}}</td>
                </tr>
                <tr>
                        <td></td>
                        <td>Pay-In slip</td>
                        <td>{{$id_slip}}</td>
                        
                </tr>
                <tr>
                        <td id="tb-b-c"></td>
                        <td id="tb-b-c">ธนาคาร </td>
                        <td id="tb-b-c">{{credit_bank}}</td>
                </tr>
            @else
                <tr>
                    <th>*ชำระด้วยบัตรเครดิต</th>
                    <td>เลขบัตร</td>
                    <td>...................</td>
                </tr>
                <tr>
                        <td></td>
                        <td>Pay-In slip</td>
                        <td>...................</td>
                        
                </tr>
                <tr>
                        <td id="tb-b-c"></td>
                        <td id="tb-b-c">ธนาคาร </td>
                        <td id="tb-b-c">...................</td>
                </tr>
            @endif
            
            
            @if ($pay == 'โอนเงิน')
                <tr>
                    <th>*ชำระด้วยการโอนเงิน</th>
                    <td>จำนวนเงิน</td>
                    <td>{{$amount}}</td>
                </tr>
                <tr>
                    <th></th>
                    <td>ธนาคาร</td>
                    <td>{{$bank}}</td>
                </tr>          
            @else
                <tr>
                    <th>*ชำระด้วยการโอนเงิน</th>
                    <td>จำนวนเงิน</td>
                    <td>...................</td>
                </tr>
                <tr>
                    <th></th>
                    <td>ธนาคาร</td>
                    <td>...................</td>
                </tr>   
            @endif
            
            </table>
        </td>
        <td style="width:5%;"></td>
        <td>
            <table id="tb-c">
                <tr>
                    <td style="height:12%; border-bottom:1px solid black;" align="center">............................................................ <br>(TUTORFORHOME)</td>
                </tr>
                <tr>
                    <td style="height:12%;" align="center">............................................................ <br>(ผู้ปกครอง)</td>
                </tr>

            </table>
        </td>
            
    </table>
               
</body>
</html>

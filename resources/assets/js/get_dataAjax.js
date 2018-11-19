function AddDatacourse(subject_id) {
    console.log(subject_id)
    //  setTimeout(() => {
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



        $.ajax({
            //type: "post",
            url: "{{route('get-name')}}",
            method: "POST",
            data:{
                'subject_id' : subject_id
            },
            dataType: "json",
            async: false,
            success:function(data){
                console.log(data);
            $('#course').html(
                data.map((data_in, index) =>
                    `<tr  class="table-danger">
                                <th scope="row">${ index + 1}</td>
                                <td>${ data_in.FirstName_Std}</td>
                                <td>${ data_in.LastName_Std}</td>
                                <td>${ data_in.NickName_Std}</td>
                                <td>${ data_in.Class_Std}</td>
                                if(${ data_in.Status } == 'no'){
                                    <td style="color:#e60000;">รอชำระเงิน</td>
                                }
                                
                                <td><button type="button" class="btn btn-secondary"><a href="{{route('payconf')}}?id=${data_in.id}">ยืนยันการจ่ายเงิน</button></td>
                                <td>
                                    <button type="button" class="btn-warning"><a href="{{route('edit.name')}}?id=${data_in.id}&term=${data_in.Term_ID}"><img src="{{ asset('img/pencil.png') }}" alt="" id="pic-icon"></a></button>
                                    <button type="button" class="btn-danger"><a href="{{route('edit.name')}}?id=${data_in.id}"><img src="{{ asset('img/bin.png') }}" alt="" id="pic-icon"></a></button>
                                </td>
                     </tr>`)
            )
            OpenTab();
            },
            error:function(data){
                console.log(data)
                alert('Dont have data');
                CloseTab();
            },
        });

   
}
function CloseTab() {
    $('#show_course').removeClass("col-5").addClass("col");
    $('#show').css('display', 'none');
}
function OpenTab() {
    $('#show_course').removeClass("col").addClass("col-5");
    $('#show').css('display', 'inline');
 }

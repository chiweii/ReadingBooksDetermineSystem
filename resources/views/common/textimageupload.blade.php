@extends('Master.master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
        <h2>文本圖檔匯入<small>上傳文本圖檔，右方呈現上傳預覽圖示，點選進行分析後開始進行文本分析</small></h2>
        <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6" id="UploadArea">
    <form action="textupload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="x_panel alert alert-success alert-dismissible fade in">
        <div class="x_content">
            <input type="file" class="form-control btn btn-success" style="height: 40%;width: 100%" name="textImg" id="textImg"/><br>
            <button class="btn btn-primary">上傳進行分析</button>
        </div>
    </div>
    </form>
</div>

<div class="col-md-6 col-sm-6 col-xs-6" id="PreviewArea">
    <div class="x_panel alert alert-danger alert-dismissible fade in">
        <div class="x_content">
            <img id="blah" src="https://www.city.sakura.lg.jp/sakura/tulip/images/noimage.jpg" alt="an" style="height: 50%;width: 100%"/>
        </div>
    </div>
</div>

<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#textImg").change(function() {
  readURL(this);
});

function deleteallimage(exam_id){
    swal({
      title: "警告",
      text: "確定要清除此考是所有匯入的學生作答圖檔嗎?",
      icon: "warning",
      dangerMode: true,
      buttons: {
        cancel: "取消",
        confirm: "確認",
      },
    })
    .then ((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: 'deleterecordsupload',
            type: 'POST',
            data: { _token: CSRF_TOKEN, exam_id: exam_id, _method: 'delete'},
            success: function (status) {
                if(status == 'success'){
                    swal("清除成功", "此考試所有學生作答圖檔已清除","success");
                }else{
                    swal("清除錯誤", "找不到學生作答的圖檔，清除失敗","error");
                }
            }
        });
      }
    });
}
</script>
@endsection

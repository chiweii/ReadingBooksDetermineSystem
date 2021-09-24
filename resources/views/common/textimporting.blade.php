@extends('Master.master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>文本內容輸入<small>輸入文本內容，輸入完畢後，點選送出進行分析後開始進行文本分析</small></h2>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <form action="textImportProcess" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-11">文本內容<span class="required">*</span></label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <textarea name="analysis_writing" id="analysis_writing"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" id="add_btn" class="btn btn-success">送出進行分析</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('#analysis_writing').ckeditor(); // if class is prefered.
    $( "#add_btn" ).click(function() {
      $.LoadingOverlay("show");
    });
</script>
@endsection

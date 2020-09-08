@extends('Master.master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>{{$title}}<small> 透過此頁面，查看批改者批改的進度</small></h2>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- top start -->
<div class="col-md-8 col-sm-6 col-xs-12" id="data_detail_area">
  <div class="x_panel" style="background-color: #becbe5;">
    <div class="x_title">
      <h2>分析數據<small>使用者可從此得知分析之文本各年段準確率圖表</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <canvas id="myChart" width="100%" height="70%"></canvas>
    </div>
  </div>
</div>
<div class="col-md-4 col-sm-6 col-xs-12" id="data_doughnut_area">
  <div class="x_panel" style="background-color: #becbe5;">
    <div class="x_title">
      <h2>歸類年段<small></small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
	    <div class="alert alert-success alert-dismissible fade in" role="alert">
	        <strong>適讀年段建議 : </strong> 高年段
	    </div>
	</div>
  </div>
</div>
@include('common.textar_script')

@endsection


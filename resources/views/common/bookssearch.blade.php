@extends('Master.master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>平台書籍/文本查詢列表<small>提供查詢書籍資料</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <span class="form-inline">
          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="BookQuery" placeholder="輸入關鍵字">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
          </div>
        </span>
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      
    <span id="booksList">
      <div class="table-responsive posts">
      <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <td class="column-title">書名</td>
              <td class="column-title">ISBN</td>
              <td class="column-title">作者</td>
              <td class="column-title">出版社</td>
              <td class="column-title">出版年份</td>
              <td class="column-title">年段</td>
            </tr>
          </thead>
          <tbody id="books_tbody">      
            @include('common.bookslistpaginate')
          </tbody>
      </table>
      </div>
      <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
      <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
      <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
    </span>
    </div>
  </div>
</div>

<!-- *************************************************************************************************** -->

<script>

$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  function fetch_data(page, sort_type, sort_by, query){
    $.ajax({
      url:"/BooksSearch/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
      success:function(data){
        if(data.search("book_name") == -1){
          // swal("無關鍵字 "+query+' 的書籍','','warning');
          $('#books_tbody').html('');
        }else{
          $('#books_tbody').html('');
          $('#books_tbody').html(data);
        }
        $('#books_tbody').LoadingOverlay("hide");
      }
    })
  }

  $(document).on('keyup', '#BookQuery', function(){
    $('#books_tbody').LoadingOverlay("show");
    setTimeout(function () {
    var query = $('#BookQuery').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    var page = $('#hidden_page').val();
    fetch_data(page, sort_type, column_name, query);
    }, 1000);
  });

  $(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();

    var query = $('#BookQuery').val();

    $('li').removeClass('active');
    $(this).parent().addClass('active');
    fetch_data(page, sort_type, column_name, query);
  });
});


</script>
@endsection

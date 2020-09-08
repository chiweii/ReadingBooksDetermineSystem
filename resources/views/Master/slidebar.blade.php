<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/dashboard" class="site_title"><i class="fa fa-pencil"></i> <span>兒童文本分類系統</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic"></div>
      <div class="profile_info">
        <h2>您好, <b>{{ Auth::user()->user_name }}</b></h2>
      </div>
    </div>
    <br />

    <!-- admin sidebar menu -->
    @if(Auth::user()->user_role == 'A')
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>管理者區塊</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>儀表板</a></li>
          <li><a><i class="fa fa-laptop"></i>資料管理<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('dashboard') }}">使用者管理</a></li>
              <li><a href="{{ route('dashboard') }}">文本管理</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i>文本分析<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('textImport') }}">文字輸入</a></li>
              <li><a href="{{ route('textUpload') }}">上傳圖檔</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    @endif
    <!-- /admin sidebar menu -->

    <!-- member sidebar menu -->
    @if(Auth::user()->user_role == 'M')
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>使用者區塊</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>儀表板</a></li>
          <li><a><i class="fa fa-edit"></i>文本分析<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('textImport') }}">文字輸入</a></li>
              <li><a href="{{ route('textUpload') }}">上傳圖檔</a></li>
            </ul>
          </li>
          <li><a href="{{ route('BooksSearch') }}"><i class="fa fa-bar-chart-o"></i>書籍年段分類查詢</a></li>
        </ul>
      </div>
    </div>
    @endif
    <!-- /member sidebar menu -->
  </div>
</div>

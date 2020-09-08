<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('Master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('Master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('Master/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('Master/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('Master/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('LoginProcess') }}" id="login_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}
              <h1>登入</h1>
              <div>
                <input type="email" name="mem_email" class="form-control" placeholder="Email" required="" onkeyup="this.value=this.value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\@\.]/g,'')"/>
              </div>
              <div>
                <input type="password" name="mem_password" class="form-control" placeholder="密碼" required="" />
              </div>
              
              <div>
                <a class="btn btn-info submit" onClick="document.forms['login_form'].submit();">登入</a>
                <a class="btn btn-warning" href="#">忘記密碼</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#" class="btn btn-success"> 申請帳號 </a>
                  <a href="{{ route('IntroPage') }}" class="btn btn-danger"> 回首頁 </a>
                </p>
                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

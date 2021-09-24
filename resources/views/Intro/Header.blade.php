<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <div class="site-logo mr-auto w-26"><a href="{{ route('IntroPage') }}">@yield('title')</a></div>

      <div class="mx-auto text-center">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
            <li><a href="#home-section" class="nav-link">簡介</a></li>
            <!-- <li><a href="#courses-section" class="nav-link">文本推薦</a></li> -->
            <li><a href="#system-section" class="nav-link">系統技術與期望</a></li>
            <li><a href="#team-section" class="nav-link">開發團隊</a></li>
          </ul>
        </nav>
      </div>

      <div class="ml-auto w-25">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
            <li class="cta"><a onclick="loginRedirect()" class="nav-link"><span>登入</span></a></li>
          </ul>
        </nav>
        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
      </div>
    </div>
  </div>
</header>
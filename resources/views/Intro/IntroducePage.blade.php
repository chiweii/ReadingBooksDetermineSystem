@extends('Intro.Master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="intro-section" id="home-section">      
      <div class="slide-1" style="background-image: url('http://www.mumblog.co.uk/wp-content/uploads/2017/11/baby-reading-books.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">簡介</h1>
                  <p class="mb-6"  data-aos="fade-up" data-aos-delay="200">本系統允許已申請帳號之使用者，使用本網站之兒童文本自動分級功能，透過輸入兒童文本內容，進行文本分析，並給予兒童文本合適年段的歸類，供使用者理解所選擇之兒童文本，適不適合自己的小孩或學生閱讀，以利於兒童進行適性閱讀。</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#system-section" style="background-color: #71b4ea !important;" class="btn btn-primary py-3 px-5 btn-pill">了解更多</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section courses-title" id="system-section">
      <div class="container" style="color: #FFFFFF;">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">系統技術與期望</h2>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/what-should-you-know-about-google-s-bert.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">Google BERT 分析文本之適讀年段</h2>
            <p class="mb-4">Google 於 2018 年 推出一項基於自然語言處理（NLP）的預訓練模型－BERT。 本系統蒐集兒童文本建立語料庫，透過 BERT 對進行語料庫讀取做模型訓練，以提供兒童文本之年段分類，以提供使用者適讀年段之建議。</p>
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/Intro-2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">資料庫歸類分析結果圖書資料</h2>
            <p class="mb-4">分析適讀年段之結果及圖書資料儲存至資料庫進行圖書資料歸類，進而擴大圖書資料之資料庫，持續增量的資料庫，未來期望進行更多樣性的兒童文本分析及提供使用者更強大的書籍查詢，以利於對兒童進行更便利的適讀建議。</p>
          </div>
        </div>

<!--         <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/intro-3-4.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">提供書籍各適讀年段查詢</h2>
            <p class="mb-4">目前平台功能，供註冊使用之國小教師查詢不同年段之閱讀書籍，可輸入年段、作者名稱、書籍名稱、出版社等進行書籍查詢，迅速找到自己要的書籍年段或書籍名，以利於供教學閱讀之參考。</p>
          </div>
        </div> -->
      </div>
    </div>

    <div class="site-section" id="team-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">開發團隊</h2>
            <p class="mb-5">...</p>
          </div>
        </div>

        <div class="row">

          <div class="col-md-6 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">
              <img src="images/team/b20140912111650.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">李政軒</h3>
                <p class="position">國立臺中教育大學 教育資訊與測驗統計研究所 <br>所長</p>
                <p>.....</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="teacher text-center">
              <img src="images/team/photo_2018-11-02_13-14-05.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">紀承瑋</h3>
                <p class="position">國立臺中教育大學 教育資訊與測驗統計研究所 <br>在職專班碩二學生</p>
                <p>.....</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
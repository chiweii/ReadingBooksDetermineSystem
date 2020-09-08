@extends('Intro.Master')
@section('title', $title)
@section('content')

@include('sweet::alert')
<div class="intro-section" id="home-section">      
      <div class="slide-1" style="background-image: url('Intropage/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">簡介</h1>
                  <p class="mb-6"  data-aos="fade-up" data-aos-delay="200">本系統允許已審核之使用者，使用本網站之文本判別系統，輸入文字或上傳文檔圖片，進行文本分析，透過大量已訓練完畢之文本內容進行比較分析，進而將使用者輸入/上傳之文本內容，進行兒童各年段分類及類型分類，未來將會列出各書籍或文本各年段之列表，供教師及訪客找尋兒童之適合文本，以利於教育兒童閱讀適合年段之書籍。</p>
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
            <h2 class="section-title">系統介紹</h2>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/what-should-you-know-about-google-s-bert.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">Google BERT 分析圖書/文本之適讀年段</h2>
            <p class="mb-4">Google 於 2019 年 推出一項基於自然語言處理（NLP）的預訓練模型－BERT。 已建立之圖書/文本樣本語料庫，將資料取出整理成BERT能存取之型態樣本檔，透過 BERT 對樣本檔進行讀取做訓練，訓練各文本之年段分類準確率，以提供使用者適讀年段之建議。</p>
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/Intro-2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">資料庫歸類分析結果圖書資料</h2>
            <p class="mb-4">分析適讀年段之結果及圖書資料儲存至資料庫進行圖書資料歸類，進而擴大圖書資料之資料庫，持續增量的資料庫，未來可供更多樣性之分析及供註冊使用之國小教師更強大的圖書類型查詢適合教學年段之圖書資料。</p>
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/intro-3-4.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-5">提供書籍各適讀年段查詢</h2>
            <p class="mb-4">目前平台功能，供註冊使用之國小教師查詢不同年段之閱讀書籍，可輸入年段、作者名稱、書籍名稱、出版社等進行書籍查詢，迅速找到自己要的書籍年段或書籍名，以利於供教學閱讀之參考。</p>
          </div>
        </div>
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
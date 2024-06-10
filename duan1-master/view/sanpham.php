<!DOCTYPE html>
    <title>Sản phẩm</title>
    
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<!--wrapper start-->
<div class="wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <div class="dog-head"></div>
      <div class="dog-body"></div>
    </div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  <header class="header-area header-default" data-bg-img="assets/img/photos/header-bg.webp">
      <div class="container">
        <div class="row no-gutter align-items-center position-relative">
          <div class="col-12">
            <div class="header-align">
              <div class="header-align-start">
                <div class="header-logo-area">
                  <a href="index.html">
                    <img class="logo-main" src="../../img/logo.png" alt="Logo" style="height: 70px;" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  <!--== End Header Wrapper ==-->
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg1.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Sản phẩm: <strong><?=$tendm?></strong></h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Sản phẩm</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="shop-top-bar">
              <div class="shop-top-left">
                <p class="pagination-line"><a href="shop.html">12</a> Product Found of <a href="shop.html">30</a></p>
              </div>
              <div class="shop-top-center">
                <nav class="product-nav">
                  <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list"></i></button>
                    <button class="nav-link" id="nav-grid2-tab" data-bs-toggle="tab" data-bs-target="#nav-grid2" type="button" role="tab" aria-controls="nav-grid2" aria-selected="false"><i class="fa fa-th-large"></i></button>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-between">
          <div class="col-xl-9">
            <div class="row">
              <div class="col-12">
                <div class="banner-product-single-style2-item">
                  <div class="thumb">
                    <a href="index.php?act=sanpham">
                      <img src="assets/img/shop/banner/3.jpg" width="870" height="247" alt="Image-HasTech">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
                      
                        <?php 
              
                            $i = 0;
                            foreach ($dssp as $sp){
                              extract($sp);
                              $linksp = "index.php?act=sanphamct&idsp=" . $id;
                              $hinh = $img_path . $img;
                              echo '<div class="col-sm-6 col-xl-4">
                              <div class="product-item">
                            <div class="product-thumb">
                              <a href="'.$linksp.'">
                                <img src="'.$hinh.'" width="270" height="320" alt="Image-HasTech">
                              </a>
                            </div>
                            <div class="product-info">
                              <h4 class="title"><a href="'.$linksp.'">'.$name.'</a></h4>
                              <div class="prices">
                                <span class="price">'.$price.' VNĐ</span>
                              </div>
                            </div>
                            <div class="product-action">                      
                              <form action="index.php?act=addtocart" method="POST">
                                <input type="hidden" name="amount" id="amount" value="1">
                                <input type="hidden" name="id" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <button type="submit" name="addtocart" value="Add">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 576 512">
                                    <!-- Biểu tượng giỏ hàng SVG của bạn -->
                                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/>
                                    </svg>
                                </button>
                            </form>                                                          
                            </div>
                          </div>
                          </div>';
                            }
                            

                        ?>
                      
                      
                      
                      
                      
                      
                      
                      
                        
                    
                      <div class="col-12">
                        <div class="pagination-items pagination-items-style1">
                          <ul class="pagination mb--0">
                            <li><a class="active" href="shop.html">1</a></li>
                            <li><a href="shop-four-columns.html">2</a></li>
                            <li><a href="shop-three-columns.html">3</a></li>
                            <li><a href="shop.html" class="icon"><i class="fa fa-angle-right"></i></a></li>
                          </ul>                    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php 
            include "boxright.php";
          ?>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </main>

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

</div>
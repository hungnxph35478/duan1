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
                  <img class="logo-main" src="../../img/logo.png" alt="Logo" style="height: 70px;"/>
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
              <h2 class="title">Quên mật khẩu</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="index.php?act=dangky">Đăng nhập</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Quên mật khẩu</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start My Account Area Wrapper ==-->
    <section class="account-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="login-form-content">
              <form method="POST" action="index.php?act=quenmk">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="username">Email<span class="required">*</span></label>
                      <input  name="email" class="form-control" type="email" required>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                      <input type="submit" class="btn-login" name="guiemail" value="Gửi"> 
                    </div>
                  </div>
              </form>
              <h3 class="thongbao">
                    <?php
                        if (isset($thongbao)&&($thongbao!="")) {
                            echo $thongbao;
                        }
                    ?>
                </h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End My Account Area Wrapper ==-->
</div>
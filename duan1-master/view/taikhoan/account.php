<title>Account - VHT</title>



<!--== Start Header Wrapper ==-->
<nav>
  <p>
    .
  </p>
</nav>
<!--== End Header Wrapper ==-->

<main class="main-content">
  <!--== Start Page Header Area Wrapper ==-->
  <div class="page-header-area" data-bg-img="assets/img/photos/bg1.webp">
    <div class="container pt--0 pb--0">
      <div class="row">
        <div class="col-12">
          <div class="page-header-content">
            <h2 class="title">Trang tài khoản</h2>
            <nav class="breadcrumb-area">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="breadcrumb-sep">//</li>
                <li>Account</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Page Header Area Wrapper ==-->

  <!--== Start My Account Wrapper ==-->
  <section class="my-account-area">
    <div class="container pt--0 pb--0">
      <div class="row">
        <div class="col-lg-12">
          <div class="myaccount-page-wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-4">
                <nav>
                  <div class="myaccount-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab" data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad" aria-selected="true">Dashboard</button>
                    <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false"> Đơn hàng</button>
                    <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false" onclick="window.location.href='index.php?act=edittk'">Cập nhật tài khoản</button>
                    <button class="nav-link" onclick="window.location.href='index.php?act=thoat'" type="button">Logout</button>
                  </div>
                </nav>
              </div>
              <?php
              if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
              ?>
                <div class="col-lg-9 col-md-8">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                      <div class="myaccount-content">
                        <h3>Dashboard</h3>
                        <div class="welcome">
                          <p>Xin chào, <strong><?= $user ?></strong> (Không phải là <strong><?= $user ?> ?</strong><a href="index.php?act=thoat" class="logout"> Đăng xuất</a>)</p>
                        </div>
                        <?php if ($role == 1) { ?>
                          <li>
                            <p><a href="admin/index.php">Đăng nhập Admin</a></p>
                          </li>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="myaccount-content">
                        <h3>Orders</h3>
                        <div class="myaccount-table table-responsive text-center">
                          <table class="table table-bordered">
                            <thead class="thead-light">
                              <?php
                              // $listbill = loadall_bill($_SESSION['user']['id']);
                              include "view/cart/mybill.php";
                              ?>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                    <?php } else { ?>
                      <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                      <div class="myaccount-content" style="margin-top:-185px; margin-left: 275px;">
                        <p>Bạn chưa đăng nhập, vui lòng <strong><a href="index.php?act=dangnhap">Đăng nhập</a></strong></p>
                        <p>Không có tài khoản? hãy <strong><a href="index.php?act=dangky">Đăng ký</a></strong></p>
                      </div>
                      </div>
                      <?php } ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End My Account Wrapper ==-->

  <!--== Start Feature Area Wrapper ==-->

  <!--== End Feature Area Wrapper ==-->
</main>
</div>
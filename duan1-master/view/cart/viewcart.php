
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
  
  <main class="main-content">
    <div class="page-header-area" data-bg-img="assets/img/photos/bg1.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Cart</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Cart</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="shopping-cart-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="shopping-cart-form table-responsive">
                <div class="boxcontent cart" >
                    <table >
                    <thead>
                         <tr>
                             <th scope="col">STT</th>
                             <th scope="col">Hình</th>
                             <th scope="col">Sản Phẩm</th>
                             <th scope="col">Giá Tiền</th>
                             <th scope="col">Số lượng</th>
                             <th scope="col">Tổng</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            global $img_path;
                            // $i = 0;
                            if (!empty($_SESSION['mycart'])) {
                                $stt = 0;
                                $ttien = 0;
                                foreach ($_SESSION['mycart'] as $idpro => $product) {
                                    $stt++;
                                    extract($product);
                                    $ttien += $total_price;
                                    $hinh = $img_path . $img;
                                    $xoasp = 'index.php?act=delcart&idcart='.$idpro;
                            ?>
                                 <tr>
                                     <td>
                                         <div>
                                             <center><?= $stt ?></center>
                                         </div>
                                     </td>
                                     <td>
                                          <img src="<?= $hinh ?>" alt="" style="width: 100px;" />
                                     </td>
                                     <td>
                                         <div class="media">
                                             <div class="media-body">
                                                 <p><?= $name ?></p>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <h5 id=" price_<?= $idpro ?>"><?= number_format($price, 0, ',', '.') ?></h5>
                                     </td>
                                     <td>
                                         <div style="display: flex; padding-left: 80px;">
                                         <a href="index.php?act=tru_cart&idpro=<?= $idpro ?>" class="text-secondary"><i class="fa fa-minus"></i></a>
                                         <div class="product_count" style="margin: 0 10px;;">
                                             <span class="text-dark font-weight-bold"><?= $soluong ?></span>
                                         </div>
                                         <a href="index.php?act=cong_cart&idpro=<?= $idpro ?>" class="text-secondary"><i class="fa fa-plus"></i></a>
                                         </div>
                                     </td>
                                     <td>
                                         <h5 id=" total_price_<?= $idpro ?>"><?= number_format($total_price, 0, ',', '.') ?></h5>
                                     </td>
                                     <td><a href="<?= $xoasp ?>">Xóa</a></td>

                                 </tr>

                         <?php
                                // $i+=1;
                                }
                            }
                            ?>

                         <tr>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>
                                 <h5>Thành tiền</h5>
                             </td>
                             <td>
                                 <h5 id=""><?= empty($_SESSION['mycart']) ? 0 : number_format($ttien, 0, ',', '.') ?> đ</h5>
                             </td>

                             <td></td>
                         </tr>
                     </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="coupon-wrap">
              <h4 class="title">Mã giảm giá</h4>
              <p class="desc">Nhập mã giảm giá nếu bạn có một cái.</p>
              <input type="text" class="form-control" placeholder="Nhập mã giảm giá ở đây">
              <button type="button" class="btn-coupon">Xác nhận</button>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="cart-totals-wrap">
              <div class="text-end">
                <a href="index.php" class="checkout-button">TÔI MUỐN MUA THÊM!</a>
                <a href="index.php?act=bill" class="checkout-button">Đến trang thanh toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>

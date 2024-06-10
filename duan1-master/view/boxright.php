<div class="col-xl-3">
  <div class="shop-sidebar">
    <div class="shop-sidebar-search">
      <div class="sidebar-search-form">
        <form action="index.php?act=sanpham" method="POST">
          <input type="search" placeholder="Search Here" name="kyw">
          <input type="submit" name="timkiem" value="Tìm">
        </form>
      </div>
    </div>

    <div class="shop-widget shop-sidebar-category">
      <h4 class="sidebar-title">Danh mục</h4>
      <div class="sidebar-category">
        <ul class="category-list mb--0">
          <?php
          $dsdm = loadall_danhmuc();
          foreach ($dsdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=sanpham&iddm=" . $id;
            echo '<li>
                                  <a href="' . $linkdm . '">' . $name . '</a>
                                  </li>';
          } ?>
        </ul>
      </div>
    </div>
    <div class="shop-widget shop-sidebar-color">
      <h4 class="sidebar-title">Color</h4>
      <div class="sidebar-color">
        <div class="color-list">
          <div data-bg-color="#ffd868"></div>
          <div class="active" data-bg-color="#721b65"></div>
          <div data-bg-color="#dd117e"></div>
          <div data-bg-color="#0aa5d2"></div>
        </div>
      </div>
    </div>
    <div class="shop-widget shop-sidebar-size">
      <h4 class="sidebar-title">Best Seller</h4>
      <div class="sidebar-size row boxcontent">
        
          <?php foreach ($dstop6 as $topsp) {
            extract($topsp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $hinh = $img_path . $img;
            echo '<div class="row top10 margin-b10" style="width: 125px; height: 90px;">
                    <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
                  </div>';
          } ?>
          
      </div>
    </div>
    <div class="shop-widget shop-sidebar-tags">
      <h4 class="sidebar-title">Tags</h4>
      <div class="sidebar-tags">
        <ul class="tags-list mb--0">
          <?php
          $dsdm = loadall_danhmuc();
          foreach ($dsdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=sanpham&iddm=" . $id;
            echo '<li>
                                  <a href="' . $linkdm . '">' . $name . '</a>
                                  </li>';
          } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
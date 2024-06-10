<div class="row boxphai margin-b">
    <div class="row formtitle margin-b">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <form action="index.php?act=listbill" method="post">
        <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input type="submit" name="listok" value="GO">
        <a href="index.php?act=listbill"><input type="button" value="Hiện tất cả"></a>
    </form>

    <div class="row formcontent">
        <div class="row margin-b10 formds">
            <table>
                <tr>
                    <th></th>
                    <th style="width: 310px;">Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                </tr>

                <?php
                    foreach($listbill_chitiet as $bill){
                        extract($bill);
  
                        ?>
                            <tr>
                                <td><input type="checkbox" name="name[]" id="check_all"></td>
                                <td><img width="80px" src="../upload/<?= $img ?>" alt=""></td>
                                <td><?= $name ?></td>
                                <td><?= $quantity ?></td>
                                <td><?= $price ?></td>
                                <td><?= $quantity * $price ?></td>
                            </tr>
                        <?php
                    }
                ?>

                
                
            </table>
        </div>
        <div class="row margin-b10" style="display:inline-block;">
            <input type="button" id="btn1" value="Chọn tất cả" style="width: 90px;">
            <input type="button" id="btn2" value="Bỏ chọn tất cả" style="width: 100px;">
            <input type="button" value="Xóa các mục đã chọn" style="width: 140px;">
        </div>
    </div>
</div>


<script language="javascript">
 
            // Chức năng chọn hết
            document.getElementById("btn1").onclick = function () 
            {
                // Lấy danh sách checkbox
                var checkboxes = document.getElementsByName('name[]');
 
                // Lặp và thiết lập checked
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = true;
                }
            };
 
            // Chức năng bỏ chọn hết
            document.getElementById("btn2").onclick = function () 
            {
                // Lấy danh sách checkbox
                var checkboxes = document.getElementsByName('name[]');
 
                // Lặp và thiết lập Uncheck
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = false;
                }
            };
 
</script>
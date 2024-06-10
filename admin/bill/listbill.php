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
                    <th>MÃ ĐƠN HÀNG</th>
                    <th style="width: 310px;">KHÁCH HÀNG</th>
                    <th>TRẠNG THÁI ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG</th>
                    <th>TỔNG ĐƠN</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>THAO TÁC</th>
                </tr>

                <?php
                    foreach($listbill as $bill){
                        extract($bill);
                        $suadh = "index.php?act=suadh&id=". $id;
                        $chitiet = "index.php?act=chitiet&id=". $id;
                        $khachhang = $bill['bill_name'].'
                                        <br> '.$bill['bill_email'].'
                                        <br> '.$bill['bill_address'].'       
                                        <br> '.$bill['bill_tel'];
                        $countsp = loadall_cart_count($bill['id']);
                        $ttdh = get_ttdh($bill['bill_status']);
                        ?>
                            <tr>
                                <td><input type="checkbox" name="name[]" id="check_all"></td>
                                <td><?= $bill['id'] ?></td>
                                <td><?= $khachhang ?></td>
                                <td><?= $ttdh ?></td>
                                <td>
                                    <?php
                                        if($bill['payment_status'] == 0) {
                                            echo "Chưa thanh toán";
                                        } else {
                                            echo "Đã thanh toán";
                                        }
                                    ?>
                                </td>
                                <td><?= $bill['total'] ?></td>
                                <td><?= $bill['ngaydathang'] ?></td>
                                <td><a href='<?= $suadh ?>'><input type="button" value="Sửa"></a> <a href='<?= $chitiet ?>'><input type="button" value="Chi tiết"></a></td>
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
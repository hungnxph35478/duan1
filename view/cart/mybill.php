<div class="row margin-b">
    <div class="boxtrai margin-r">


    <div class="row margin-b">
        <?php
            if(isset($list_bill)) {
                ?>     
                    <div class="boxtitle">CHI TIẾT ĐƠN HÀNG</div>
                    <div class="boxcontent cart">
                        <table>
                            <tr>
                                <th>MÃ ĐƠN</th>
                                <th>NGÀY ĐẶT</th>
                                <th>SỐ LƯỢNG MẶT HÀNG</th>
                                <th>TỔNG TIỀN</th>
                                <th>TRẠNG THÁI</th>
                                <th>TÌNH TRẠNG</th>
                                <th>THAO TÁC</th>
                            </tr>

                            <?php 
                                foreach ($list_bill as $bill){
                                    $huydh = "index.php?act=huydh&id=".$bill['id'];
                                    // extract($bill);
                                    $ttdonhang = get_ttdh($bill['bill_status']);
                                    $countsp = loadall_cart_count($bill['id']);
                                    ?>
                                        <tr>
                                            <td><?= $bill['id'] ?></td>
                                            <td><?= $bill['ngaydathang'] ?></td>
                                            <td><?= count($countsp) ?></td>
                                            <td><?= $bill['total'] ?></td>
                                            <td><?= $ttdonhang ?></td>
                                            <td>
                                                <?php
                                                    if($bill['payment_status'] == 0) {
                                                        echo "Chưa thanh toán";
                                                    } else {
                                                        echo "Đã thanh toán";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($bill['bill_status'] == 0 || $bill['bill_status'] == 1) {
                                                        ?>
                                                            <a href="<?= $huydh ?>">Hủy đơn</a>
                                                        <?php
                                                    } else {
                                                        echo "Không thể hủy đơn";
                                                    }
                                                ?>
                                            <td>                                               
                                        </tr>
                                    <?php
                                }
                                
                            ?>

                            
                        </table>
                    </div>
                </div>
                <?php
            } else {
                ?>
                    <span>Chưa có đơn hàng</span>
                <?php
            }
        ?>
    </div>
</div>
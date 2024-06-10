
<?php

function get_all_cart(){
    $sql = "select * from bill order by ngaydathang desc";
    return pdo_query($sql);
}

function createCartDetail($iduser,$idpro,$soluong,$thanhtien){
    $sql = "insert into cart(iduser,idpro,soluong,thanhtien) value(?,?,?,?)";
    pdo_execute($sql,$iduser,$idpro, $soluong, $thanhtien);
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}


function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $total)
{
    $sql = "INSERT INTO bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) 
        values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$total')";
    
    // die($sql);
    return pdo_execute_return_lastInsertId($sql);
}

function insert_order_detail($id,$product_id,$quantity,$price) {
    $sql = "INSERT INTO `bill_chitiet`(`order_id`, `product_id`, `quantity`, `price`) 
            VALUES 
            ('$id','$product_id','$quantity','$price')";
    pdo_execute($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
        values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute_return_lastInsertId($sql);
}

function loadone_bill($id){
    $sql = "select * from bill where id =" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill){
    $sql = "select * from cart where idbill =" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function update_bill($id, $bill_name, $bill_address, $bill_tel, $bill_email, $total, $bill_status, $ngaydathang){ 
    $sql = "update bill set bill_name='".$bill_name."', bill_address='".$bill_address."', bill_tel='".$bill_tel."', bill_email='".$bill_email."', total='".$total."', bill_status='".$bill_status."', ngaydathang='".$ngaydathang."' where id =".$id;
    pdo_execute($sql);
}

function chitiet_bill($listbill)
{
    $tong = 0;

    foreach ($listbill as $cart) {
        extract($cart);
        $thanhtien = $price * $soluong;
        $tong += $thanhtien;
        echo '<tr>
                <td><img src="./upload/'.$img.'" height="60px" width="60px"></td>
                <td>' . $name . '</td>
                <td>' . $price . ' VNĐ</td>
                <td>' . $soluong . '</td>
                <td>' . $thanhtien . ' VNĐ</td>
                </tr>';
    }
    echo '<tr colspan="4">
                <td>Tổng đơn hàng</td>             
                <td style="color: red; font-weight:700;">' . $tong + $_SESSION['ship'] . ' VNĐ</td>
                </tr>';
}


function update_dh($id, $ttdh)
{
  $sql = "update bill set bill_status='".$ttdh."' where id=".$id;
  pdo_execute($sql);
}

function update_trangthai($id) {
    $sql = "UPDATE bill SET payment_status = 1 WHERE id = $id";
    pdo_execute($sql);
}

function delete_donhang($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}


function loadall_bill($kyw = "", $iduser = 0)
{

    $sql = "select * from bill where 1";
    if ($kyw != "") {
        $sql .= " AND id like '%" . $kyw . "%'";
    }
    if ($iduser > 0) {
        $sql .= " AND iduser =" . $iduser;
    }
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function load__bilL($kyw = "", $iduser = 0) {
    $sql = "select * from bill where 1";
    if ($kyw != "") {
        $sql .= " AND id like '%" . $kyw . "%'";
    }
    if ($iduser > 0) {
        $sql .= " AND iduser =" . $iduser;
    }
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function load_bill_byuser($id_user) {
    $sql = "SELECT * FROM bill WHERE iduser = $id_user ORDER BY id DESC";
    return pdo_query($sql);
}

function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill =" . $idbill;
    return pdo_query($sql);
}

function load_bill_admin($idorder) {
    $sql = "SELECT
                bill_chitiet.id,
                bill_chitiet.order_id,
                bill_chitiet.product_id,
                bill_chitiet.quantity,
                bill_chitiet.price,
                sanpham.id,
                sanpham.name,
                sanpham.price,
                sanpham.soluong,
                sanpham.img
            FROM 
                bill_chitiet 
            JOIN
                sanpham ON sanpham.id = bill_chitiet.product_id
            WHERE 
                bill_chitiet.order_id = $idorder 
            ORDER BY 
                bill_chitiet.id desc
            ";
    return pdo_query($sql);
}


function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng chờ xác nhận";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Giao hàng thành công";
            break;
        case '4':
            $tt = "Đã hủy";
            break;
        default:
            $tt = "Đơn hàng chờ xác nhận";
            break;
    }
    return $tt;
}

function thanhtoan_status($n){
    switch ($n) {
        case '0':
            $tt = "Chưa thanh toán";
            break;
        case '1':
            $tt = "Đã thanh toán";
            break;
        default:
            $tt = "Chưa thanh toán";
            break;
    }
    return $tt;
}


function loadall_thongke()
{
    $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp,
         min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql .= " group by danhmuc.id order by danhmuc.id";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>


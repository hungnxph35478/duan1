<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "header2.php";
include "global.php";

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

// unset($_SESSION['checkout_detail']);

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop6 = loadall_sanpham_top6();
$dstop = loadall_sanpham_top4();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $spcungloai = loadone_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "home2.php";
            }

            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đăng ký thành công, vui lòng đăng nhập để thực hiện chức năng hoặc đặt hàng!";
            }

            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    // $thongbao = "Đăng nhập thành công!";
                    include "view/taikhoan/account.php";
                } else {
                    $thongbao = "Tên đăng nhập hoặc mật khẩu không đúng, vui lòng kiểm tra lại!";
                }
            }
            if (!is_array($checkuser)) {
                include "view/taikhoan/dangnhap.php";
            } else {
                $_SESSION['user'] = $checkuser;
                // $thongbao = "Đăng nhập thành công!";
            }

            break;
        case 'account':
            if(!isset($_SESSION['user'])) {
                echo "<script>alert('Vui lòng đăng nhập để truy cập')</script>";
                echo "<script>window.location.href = 'index.php?act=dangnhap'</script>";
            }
            $list_bill = load_bill_byuser($_SESSION['user']['id']);
            // print_r($list_bill);
            include "view/taikhoan/account.php";
            break;
        case 'edittk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                header("Location: index.php?act=edittk");
            }

            include "view/taikhoan/edittk.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại!";
                }
            }

            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            include "view/taikhoan/dangnhap.php";
            break;
        case 'addtocart':
            if(!isset($_SESSION['user'])){
                echo '<script>alert("Đăng nhập để tiếp tục");window.location="index.php?act=dangnhap";</script>';    
            }
            else{
                if (!isset($_SESSION['mycart'])) {
                    $_SESSION['mycart'] = array();
                }
                if(isset($_POST['addtocart'])||isset($_GET['idpro'])){
                    $id = isset($_POST['id'])?$_POST['id']:$_GET['idpro'];
                    $soluong = isset($_POST['soluong'])?$_POST['soluong']:'1';
                    $img = $_POST['img'];
                    if(isset($_SESSION['mycart'][$id])){
                        if(($_SESSION['mycart'][$id]['soluong']+$soluong)>3){
                        }
                        else{
                        $_SESSION['mycart'][$id]['soluong'] +=$soluong;
                        $_SESSION['mycart'][$id]['total_price'] = $_SESSION['mycart'][$id]['price'] * $_SESSION['mycart'][$id]['soluong'];
                        }
                    }
                    else{
                        $product = loadone_sanpham($id);
                        $_SESSION['mycart'][$id] =[
                            'name' => $product['name'],
                            'price' => $product['price'],
                            'img' => $product['img'],
                            'id' => $idcart,
                            'soluong' => $soluong,
                            'total_price' => $product['price'] * $soluong
                        ];
                        
                    }
                }
                header('Location: index.php?act=giohang');
            }
            break;

            case 'cong_cart':
                if(isset($_GET['idpro'])){
                    $idpro = $_GET['idpro'];
                    if(isset($_SESSION['mycart'][$idpro])){
                        
                        if($_SESSION['mycart'][$idpro]['soluong'] < 3 ){
                        $_SESSION['mycart'][$idpro]['soluong']+=1;
                        $_SESSION['mycart'][$idpro]['total_price'] = $_SESSION['mycart'][$idpro]['soluong'] * $_SESSION['mycart'][$idpro]['price'];
                        }
                        header('Location: index.php?act=giohang');
                    }
                    // include "view/cart/viewcart.php";
                }
                break;
            case 'tru_cart':
                if (isset($_GET['idpro'])) {
                    $idpro = $_GET['idpro'];
                    if (isset($_SESSION['mycart'][$idpro])) {
                        if($_SESSION['mycart'][$idpro]['soluong'] <= 3 && $_SESSION['mycart'][$idpro]['soluong'] >= 0){
                        $_SESSION['mycart'][$idpro]['soluong'] -= 1;
                        $_SESSION['mycart'][$idpro]['total_price'] = $_SESSION['mycart'][$idpro]['soluong'] * $_SESSION['mycart'][$idpro]['price'];
                        }
                        if($_SESSION['mycart'][$idpro]['soluong'] == 0){
                            unset($_SESSION['mycart'][$idpro]);
                        }
                        header('Location: index.php?act=giohang');
                    }
                }
                break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=giohang');
            // include "view/cart/viewcart.php";
            break;
        case 'giohang':
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'billconfirm':

            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $iduser = $_SESSION['user']['id'];
                $name = $_POST['user'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $ngaydathang = date('Y-m-d H:s:i');
                $total = $_POST['total'];
                // foreach($_SESSION['mycart'] as $product ){
                //     $tong_tien += $product['total_price'];
                // }
                $pttt = $_POST['pttt'];
                
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                //     die;
                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $total);
                
                    
                foreach($_SESSION['mycart'] as $idpro => $product){
                    extract($product);
                    $thanhtien = $price * $soluong;

                    insert_order_detail($idbill,$idpro,$soluong,$price);

                    product_update_quantity($soluong,$idpro);

                    createCartDetail($_SESSION['user']['id'],$idpro,$soluong,$total_price);

                    insert_cart($_SESSION['user']['id'], $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill);
                }

                // foreach ($_SESSION['mycart'] as $cart) {
                //     $thanhtien = $cart['price'] * $cart['soluong'];
                // }
                
                unset($_SESSION['mycart']);

                // header('Location: view/cart/billconfirm_chitiet.php');
            }
                // $_SESSION['idbill'] = $idbill;
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            // $listbill = loadall_bill($_SESSION['user']['id']);
            $list_bill = load__bilL($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        
        case 'huydh':
            $list_bill = load_bill_byuser($_SESSION['user']['id']);
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $dh = loadone_bill($id);
                extract($dh);
                if ($bill_status == 0) {
                    update_dh($id, 4);
                } else {
           
                    echo "Không thể hủy đơn hàng với trạng thái hiện tại là: ";
                }
            }
                // header("Location: index.php?act=account");
            include "view/taikhoan/account.php";
            break;
        default:
            include "home2.php";
            break;
    }
} else {
    include "home2.php";
}
include "footer2.php";
ob_flush();
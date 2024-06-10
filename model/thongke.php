<?php
    function tk_hang_hoa()
    {
        $sql = "select lo.id, lo.name , count(*)soluong,min(hh.price)gia_min,max(hh.price)gia_max,avg(hh.price)gia_avg
                from sanpham hh join danhmuc lo on lo.id= hh.iddm group by lo.id,lo.name ";
        return pdo_query($sql);
    }
    // function tk_binh_luan()
    // {
    //     $sql = "select hh.id,hh.name,count(*)soluong,min(bl.ngaybinhluan)cu_nhat,max(bl.ngaybinhluan)moi_nhat
    //                 from comment bl join product hh on hh.product_id=bl.product_id group by hh.product_id, hh.product_name having so_luong>0";
    //     return pdo_query($sql);
    // }
    function so_luong_hang(){
        $sql = "select count(*) from sanpham";
        return pdo_query_value($sql);
    }
    function so_luong_user(){
        $sql = "select count(*) from taikhoan";
        return pdo_query_value($sql);
    }
    function so_luong_don_hang(){
        $sql = "select count(*) from bill";
        return pdo_query_value($sql);
    }
    function tong_doanh_thu(){
        $sql = "select sum(thanhtien) as tong from cart";
        return pdo_query_value($sql);
    }
//     function loadall_thongke()
// {
//     $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp,
//          min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
//     $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
//     $sql .= " group by danhmuc.id order by danhmuc.id";
//     $listtk = pdo_query($sql);
//     return $listtk;
// }

?>
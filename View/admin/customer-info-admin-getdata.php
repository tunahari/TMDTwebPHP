<?php
session_start();
//////////////
@$TenKhachHang = $_POST['KH_TenKhachHang'];
@$SDTKhachHang = $_POST['KH_SDTKhachHang'];
@$DiaChiKhachHang = $_POST['KH_DiaChiKhachHang'];
@$EmailKhachHang = $_POST['KH_EmailKhachHang'];
@$LoaiKhachHang = $_POST['KH_LoaiKhachHang'];
//////////////
$_SESSION['EmailKhachHang'] = $EmailKhachHang;
$_SESSION['TenKhachHang'] = $TenKhachHang;
$_SESSION['SDTKhachHang'] = $SDTKhachHang;
$_SESSION['DiaChiKhachHang'] = $DiaChiKhachHang;
$_SESSION['LoaiKhachHang'] = $LoaiKhachHang;
?>
<script>
    console.log(<?php echo "$TenKhachHang" ?>);
</script>
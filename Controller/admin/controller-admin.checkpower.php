<?php
session_start();
if (isset($_POST['checkPower']) && $_POST['checkPower'] === 'check-power') {
    echo $_SESSION['sesion-array']['NV_ChucVuNhanVien'];
}
?>
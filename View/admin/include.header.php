<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ./login-admin.php');
}
?>
<div class="header">
    <div class="nav">
        <div class="nav__left">
            <div class="nav__left--logo">
                SB Mobile
            </div>
            <div class="nav__left--menu">
                <i class='bx bx-menu'></i>
            </div>
            <div class="nav__left--search">
                <div class="search__input">
                    <input type="text" placeholder="Tìm kiếm...">
                    <div class="search__input__btn">
                        <i class='bx bx-search-alt-2'></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav__right">
            <div class="nav__right--mess">
                <i class='bx bx-message-rounded-dots'></i>
            </div>

            <div class="nav__right--notifi">
                <i class='bx bxs-bell bx-tada'></i>
            </div>

            <a href="./profile-admin.php">
                <div class="nav__right--avarta">
                    <i class='bx bx-user'></i>
                </div>
            </a>

            <div class="nav__right--logout" id="Log__Out__Admin">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>
        </div>
    </div>
</div>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script>
    $(document).ready(function() {
        const ClassFuction = new HandlingFunctions();
        $('#Log__Out__Admin').click(function() {
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.logout.php', 
            {
                logoutAdmin : 'log-out-admin'
            }
            ).done(function(response){
                console.log(response)
                if (response.trim() === 'logout-success') {
                    window.location = './login-admin.php'
                } else {
                    alert('Lỗi logout!')
                }
            })
        })
    })
</script>
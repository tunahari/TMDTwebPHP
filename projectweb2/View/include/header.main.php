<div class="Product__Page__Header">
    <div class="Product__Page__Header__Top">
        <div class="Product__Page__Header__Top__Logo">
            <div class="Product__Page__Header__Top__Logo__Group">
                <i href="product/product.view.php" class="fa-solid fa-mobile-screen"></i>
                SB Moible
            </div>
            <div class="Product__Page__Header__Top__Gift">
                <i class="fa-solid fa-gift"></i>
            </div>
        </div>
        <div class="Product__Page__Header__Top__Info__Nav">
            <div class="Product__Page__Header__Top__Info">
                <div class="Product__Page__Header__Top__Info__Email">
                    <i class="fa-solid fa-envelope"></i>
                    TunaHari86@gmail.com
                </div>
                <div class="Product__Page__Header__Top__Info__Time">
                    <i class="fa-solid fa-clock"></i>
                    08:00 AM To 06:00 PM
                </div>
            </div>
            <div class="Product__Page__Header__Top__Nav__Group">
                <a href="#">Quà Tặng</a>
                <a href="#">Ủng Hộ</a>
                <a href="#">Tính Năng</a>
                <a href="#">Trợ Giúp</a>
            </div>
        </div>
    </div>
    <div class="Product__Page__Header__Bottom">
        <div class="Product__Page__Header__Bottom__Logo__Search">
            <div class="Product__Page__Header__Bottom__Filter__Bar">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="./product.view.php" style="cursor: pointer;" class="Product__Page__Header__Bottom__Logo">
                <i class="fa-solid fa-mobile-screen"></i>
                SB Moblie
            </a>
            <div class="Product__Page__Header__Bottom__Search">
                <!-- =========================== Tìm kiếm sản phẩm =========================== -->
                <input type="text" placeholder="Tìm kiếm sản phẩm..." id="FilterName">
                <!-- =========================== Tìm kiếm sản phẩm =========================== -->
                <div class="Product__Page__Header__Bottom__Search__Button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
        <div class="Product__Page__Header__Bottom__Phone__Cart__Wishlist__Account">
            <?php
            require_once '../../Model/database/connectDataBase.php';
            require_once '../../Model/product/model-product.cart.php';
            require_once '../../Model/admin/model-amin.customer.php';
            $CartClass = new Cart;
            $CustomerClass = new Customer;
            if (isset($_SESSION['email'])) {
                $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
                $customerID = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
                $CartClass->setGH_IDKhachHang($customerID);
                echo '
                <div class="Product__Page__Header__Bottom__Cart">
                    <a href="../product/cart.view.php">
                        <div class="Product__Page__Header__Bottom__Cart__Icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div class="Product__Page__Header__Bottom__Cart__Quantity">
                                '.$CartClass->countProductCart().'
                            </div>
                        </div>
                    </a>
                    <p>Giỏ Hàng</p>
                </div>
                <div class="Product__Page__Header__Bottom__Wishlist">
                    <a href="#">
                        <div class="Product__Page__Header__Bottom__Wishlist__Icon">
                            <i class="fa-solid fa-heart"></i>
                            <div class="Product__Page__Header__Bottom__Wishlist__Quantity">
                                0
                            </div>
                        </div>
                    </a>
                    <p>Yêu Thích</p>
                </div>
                <div class="Product__Page__Header__Bottom__LogOut">
                    <div class="Product__Page__Header__Bottom__LogOut__Icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <p>Đăng Xuất</p>
                </div>

                <div class="Product__Page__Header__Bottom__Account">
                    <a href="./profile.view.php">
                        <div class="Product__Page__Header__Bottom__Account__Icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </a>
                    <p>Tài Khoản</p>
                </div>
                ';
            } else {
                echo '
                <div class="Product__Page__Header__Bottom__Cart">
                    <a href="./login.view.php">
                        <div class="Product__Page__Header__Bottom__Cart__Icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </a>
                    <p>Giỏ Hàng</p>
                </div>
                <div class="Product__Page__Header__Bottom__Wishlist">
                    <a href="./login.view.php">
                        <div class="Product__Page__Header__Bottom__Wishlist__Icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </a>
                    <p>Yêu Thích</p>
                </div>
                <div class="Product__Page__Header__Bottom__Account">
                    <a href="./register.view.php">
                        <div class="Product__Page__Header__Bottom__Account__Icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </a>
                    <p>Đăng Ký</p>
                </div>
                <div class="Product__Page__Header__Bottom__Account">
                    <a href="./login.view.php">
                        <div class="Product__Page__Header__Bottom__Account__Icon">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </div>
                    </a>
                    <p>Đăng Nhập</p>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const ClassFuction = new HandlingFunctions();
        $('.Product__Page__Header__Bottom__LogOut').click(function(e) {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.logout.php', 
                {
                    logoutFlag: 'logout', 
                    logoutEmail: `<?php 
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    } else {
                        echo '';
                    }
                    ?>`,
                }
                ).done(function(response){
                    response = response.trim()
                    if (response === 'success') {
                        location.reload()
                    }
            })
        })
    })
</script>
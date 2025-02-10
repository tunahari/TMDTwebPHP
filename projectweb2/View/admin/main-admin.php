<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <?php include './include.header.php'; ?>
        <div class="containers">
            <?php include './include.menu.php'; ?>
            <div class="content">
                <div class="content__chart">
                    <div class="row_1">
                        <div class="content__chart--box col_1">
                            <div class="chart__box--title">
                                <h4 class="title__chart">Doanh Thu</h4>
                                <div class="select__y_m_d">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </div>

                                <div class="box__input--date">
                                    <input type="date">
                                </div>
                            </div>
                            <div class="chart__box--description">
                                <h4>Tổng Doanh Thu<span>32.000.000 <b>VNĐ</b></span></h4>
                            </div>
                            <canvas id="myChart"></canvas>
                        </div>

                        <div class="content__chart--box col_2">
                            <h4 class="title__chart">Doanh Thu Theo Hãng</h4>
                            <canvas id="myChart-Circle"></canvas>
                        </div>
                    </div>

                    <div class="row_2">
                        <div class="col__container">
                            <div class="content__chart--box col_3">
                                <div class="col__3--title">
                                    <h4 class="title__chart">Lợi Nhuận Ngày</h4>
                                    <div class="select__y_m_d">
                                        <i class='bx bx-dots-horizontal-rounded'></i>
                                    </div>

                                    <div class="box__input--date">
                                        <input type="date">
                                    </div>
                                </div>
                                <canvas id="myChart-cot"></canvas>
                            </div>
                        </div>

                        <div class="col__container">
                            <div class="content__chart--box col_4">
                                <div class="col__3--title">
                                    <h4 class="title__chart">Tóm Lược</h4>
                                    <div class="select__y_m_d">
                                        <i class='bx bx-dots-horizontal-rounded'></i>
                                    </div>

                                    <div class="box__input--date">
                                        <input type="date">
                                    </div>
                                </div>
                                <div class="chart__4--box">
                                    <div class="box__icon number_1">
                                        <i class='bx bx-money-withdraw'></i>
                                    </div>
                                    <div class="box__des">
                                        <div class="box__title">
                                            <h5>Doanh Thu</h5>
                                            <h5>31.000.000 VND<span></span>
                                            </h5>
                                        </div>
                                        <div class="box__bar number_1"></div>
                                    </div>
                                </div>

                                <div class="chart__4--box">
                                    <div class="box__icon number_2">
                                        <i class='bx bxs-credit-card'></i>
                                    </div>
                                    <div class="box__des">
                                        <div class="box__title">
                                            <h5>Lợi Nhuận</h5>
                                            <h5>31.000.000 <span>VND</span></h5>
                                        </div>
                                        <div class="box__bar number_2"></div>
                                    </div>
                                </div>

                                <div class="chart__4--box">
                                    <div class="box__icon number_3">
                                        <i class='bx bx-basket'></i>
                                    </div>
                                    <div class="box__des">
                                        <div class="box__title">
                                            <h5>Chi Phí</h5>
                                            <h5>31.000.000 <span>VND</span></h5>
                                        </div>
                                        <div class="box__bar number_3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row_4">
                        <div class="box__row-4__container">
                            <h4 class="title__chart">ĐƠN HÀNG GẦN ĐÂY</h4>
                            <div class="list__table--order">
                                <div class="list__table--order__table">
                                    <div class="list__table--order__table__thead">
                                        <div class="list__table--order__table__thead__tr">
                                            <div class="list__table--order__table__thead__tr__th">ID</div>
                                            <div class="list__table--order__table__thead__tr__th">Tên Sản Phẩm</div>
                                            <div class="list__table--order__table__thead__tr__th">Khách Hàng</div>
                                            <div class="list__table--order__table__thead__tr__th">Giá Bán</div>
                                            <div class="list__table--order__table__thead__tr__th">T.Thái</div>
                                        </div>
                                    </div>
                                    <div class="list__table--order__table__tbody">
                                        <div class="list__table--order__table__tbody__tr">
                                            <div class="list__table--order__table__tbody__tr__td">#123</div>
                                            <div class="list__table--order__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--order__table__tbody__tr__td">Hoàng Tuấn Hải</div>
                                            <div class="list__table--order__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--order__table__tbody__tr__td">
                                                <div class="list__table--order__status list__table--order__status__pending">Pending</div>
                                            </div>
                                        </div>
                                        <div class="list__table--order__table__tbody__tr">
                                            <div class="list__table--order__table__tbody__tr__td">#123</div>
                                            <div class="list__table--order__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--order__table__tbody__tr__td">Hoàng Tuấn Hải</div>
                                            <div class="list__table--order__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--order__table__tbody__tr__td">
                                                <div class="list__table--order__status list__table--order__status__shipped">Shipped</div>
                                            </div>
                                        </div>
                                        <div class="list__table--order__table__tbody__tr">
                                            <div class="list__table--order__table__tbody__tr__td">#123</div>
                                            <div class="list__table--order__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--order__table__tbody__tr__td">Hoàng Tuấn Hải</div>
                                            <div class="list__table--order__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--order__table__tbody__tr__td">
                                                <div class="list__table--order__status list__table--order__status__pail">Pail</div>
                                            </div>
                                        </div>
                                        <div class="list__table--order__table__tbody__tr">
                                            <div class="list__table--order__table__tbody__tr__td">#123</div>
                                            <div class="list__table--order__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--order__table__tbody__tr__td">Hoàng Tuấn Hải</div>
                                            <div class="list__table--order__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--order__table__tbody__tr__td">
                                                <div class="list__table--order__status list__table--order__status__pending">Pending</div>
                                            </div>
                                        </div>
                                        <div class="list__table--order__table__tbody__tr">
                                            <div class="list__table--order__table__tbody__tr__td">#123</div>
                                            <div class="list__table--order__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--order__table__tbody__tr__td">Hoàng Tuấn Hải</div>
                                            <div class="list__table--order__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--order__table__tbody__tr__td">
                                                <div class="list__table--order__status list__table--order__status__pending">Pending</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box__row-4__container">
                            <h4 class="title__chart">BÁN CHẠY</h4>
                            <div class="list__table--product">
                                <div class="list__table--product__table">
                                    <div class="list__table--product__table__thead">
                                        <div class="list__table--product__table__thead__tr">
                                            <div class="list__table--product__table__thead__tr__th">ID</div>
                                            <div class="list__table--product__table__thead__tr__th">Tên Sản Phẩm</div>
                                            <div class="list__table--product__table__thead__tr__th">Giá Bán</div>
                                            <div class="list__table--product__table__thead__tr__th">S.Lượng</div>
                                        </div>
                                    </div>
                                    <div class="list__table--product__table__tbody">
                                        <div class="list__table--product__table__tbody__tr">
                                            <div class="list__table--product__table__tbody__tr__td">#123</div>
                                            <div class="list__table--product__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--product__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--product__table__tbody__tr__td">100</div>
                                        </div>
                                        <div class="list__table--product__table__tbody__tr">
                                            <div class="list__table--product__table__tbody__tr__td">#123</div>
                                            <div class="list__table--product__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--product__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--product__table__tbody__tr__td">100</div>
                                        </div>
                                        <div class="list__table--product__table__tbody__tr">
                                            <div class="list__table--product__table__tbody__tr__td">#123</div>
                                            <div class="list__table--product__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--product__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--product__table__tbody__tr__td">100</div>
                                        </div>
                                        <div class="list__table--product__table__tbody__tr">
                                            <div class="list__table--product__table__tbody__tr__td">#123</div>
                                            <div class="list__table--product__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--product__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--product__table__tbody__tr__td">100</div>
                                        </div>
                                        <div class="list__table--product__table__tbody__tr">
                                            <div class="list__table--product__table__tbody__tr__td">#123</div>
                                            <div class="list__table--product__table__tbody__tr__td">Samsung Galaxy Note 20</div>
                                            <div class="list__table--product__table__tbody__tr__td">17.990.000</div>
                                            <div class="list__table--product__table__tbody__tr__td">100</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="./chart-admin.js"></script>
    <script src="./script-admin.js"></script>
    <script src="./test-admin.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        const Fuction = new HandlingFunctions();
        function checkPower () {
            Fuction.getAjaxPost('../../Controller/admin/controller-admin.checkpower.php', {
                checkPower: 'check-power'
            }).done(function(response){
               if (response.trim() === '-1' || response.trim() === '0') {
                    Fuction.getAjaxPost('../../Controller/admin/controller-admin.logout.php', {
                        logoutAdmin: 'log-out-admin'
                    }).done(function(response){
                        if (response.trim() === 'logout-success') {
                            window.location = './login-admin.php'
                        }
                    });
               }
            });
        }
        checkPower()
    })
</script>

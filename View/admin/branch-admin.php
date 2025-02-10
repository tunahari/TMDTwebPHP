<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Chi Nhánh</title>
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./product-admin.css">
    <link rel="stylesheet" href="./branch-admin.css">
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
            <div class="list__table--container">
                <h1>QUẢN LÝ CHI NHÁNH</h1>
                <div class="check__table">
                    <div class="select__product">
                        <h4>Hiển thị</h4>
                        <div class="select__branch__box">
                            <div class="select__branch__option__selected">
                                <div class="select__branch__option" value="5">5</div>
                            </div>
                            <div class="select__branch__option__box">
                                <div class="select__branch__option" value="5">5</div>
                                <div class="select__branch__option" value="10">10</div>
                                <div class="select__branch__option" value="15">15</div>
                                <div class="select__branch__option" value="20">20</div>
                            </div>
                        </div>
                    </div>
                    <div class="search__branch">
                        <input type="text" placeholder="Tìm kiếm..." id="search__branch__input">
                        <div class="search__branch__button">
                            <i class='bx bx-search-alt-2'></i>
                        </div>
                    </div>
                </div>
                <div class="Chat__Left__Create__Branch">
                        <i class="fa-solid fa-circle-plus"></i> Thêm
                </div>
                <div class="table__branch--container">
                    <div class="table__branch__thead">
                        <div class="table__branch__thead__tr">
                            <div class="table__branch__thead__tr__th" id="sort__branch__id" value="DESC">
                                ID<i class="fa-solid fa-arrows-up-down"></i>
                            </div>
                            <div class="table__branch__thead__tr__th">Tên Chi Nhánh</div>
                            <div class="table__branch__thead__tr__th">Địa Chỉ</div>
                            <div class="table__branch__thead__tr__th">Hotline</div>
                            <div class="table__branch__thead__tr__th">Quản Lý</div>
                            <div class="table__branch__thead__tr__th" id="sort__branch__date" value="ASC">
                                Ngày TL
                                <i class="fa-solid fa-arrows-up-down"></i>
                            </div>
                            <div class="table__branch__thead__tr__th">Xóa</div>
                        </div>
                    </div>
                    <div class="table__branch__tbody"></div>
                </div>

                <!-- PAGINATION -->
                <div class="pagination__branch"></div>
                <!-- ALERT -->
                <div class="alert__delete__branch">
                    <div class="alert__delete__branch__icon">
                        <i class='bx bxs-trash'></i>
                    </div>
                    <div class="alert__delete__branch__title">
                        Want to delete this item?
                    </div>
                    <div class="alert__delete__branch__text">
                        You will not be able to recover this item!
                    </div>
                    <div class="alert__delete__branch__button__group">
                        <div class="alert__delete__branch__cancel">
                            Cancel
                        </div>
                        <div class="alert__delete__branch__delete" value="">
                            Delete
                        </div>
                    </div>
                </div>
                <!-- LOADING -->
                <div class="loading__box">
                    <p>Đang Thực Hiện...</p>
                    <div class="loading"></div>
                </div>
                <!-- ALERT NOTIFY SUCCESS -->
                <div class="alert__notify__box__success">
                    <div class="alert__notify__box__success__close"><i class="fa-solid fa-xmark"></i></div>
                    <div class="alert__notify__box__success__left">
                        <div class="alert__notify__box__success__left__icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="alert__notify__box__success__right">
                        <div class="alert__notify__box__success__right__title">Thành Công</div>
                        <div class="alert__notify__box__success__right__content"></div>
                    </div>
                    <div class="alert__notify__box__success__progress"></div>
                </div>
                <!-- ALERT NOTIFY Failed -->
                <div class="alert__notify__box__failed">
                    <div class="alert__notify__box__failed__close"><i class="fa-solid fa-xmark"></i></div>
                    <div class="alert__notify__box__failed__left">
                        <div class="alert__notify__box__failed__left__icon">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                    <div class="alert__notify__box__failed__right">
                        <div class="alert__notify__box__failed__right__title">Thất Bại</div>
                        <div class="alert__notify__box__failed__right__content"></div>
                    </div>
                    <div class="alert__notify__box__failed__progress"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="./script-admin.js"></script>
<script src="./test-admin.js"></script>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/admin/controller-admin.branch.js"></script>

<script>
    $(document).ready(function() {
        const Fuction = new HandlingFunctions();
        function checkPower () {
            Fuction.getAjaxPost('../../Controller/admin/controller-admin.checkpower.php', {
                checkPower: 'check-power'
            }).done(function(response){
               if (response.trim() === '-1' || response.trim() === '0' || response.trim() === '1') {
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
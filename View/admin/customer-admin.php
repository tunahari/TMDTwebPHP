<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Khách Hàng</title>
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./product-admin.css">
    <link rel="stylesheet" href="./customer-admin.css">
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
                <h1>QUẢN LÝ KHÁCH HÀNG</h1>
                <div class="check__table">
                    <div class="select__product">
                        <h4>Hiển thị</h4>
                        <div class="select__customer__box">
                            <div class="select__customer__option__selected">
                                <div class="select__customer__option" value="5">5</div>
                            </div>
                            <div class="select__customer__option__box">
                                <div class="select__customer__option" value="5">5</div>
                                <div class="select__customer__option" value="10">10</div>
                                <div class="select__customer__option" value="15">15</div>
                                <div class="select__customer__option" value="20">20</div>
                            </div>
                        </div>
                    </div>
                    <div class="search__product">
                        <input type="text" placeholder="Tìm kiếm..." id="search__customer__input">
                        <div class="search__product__button">
                            <i class='bx bx-search-alt-2'></i>
                        </div>
                    </div>
                </div>

                <div class="table__customer--container">
                    <div class="table__customer__thead">
                        <div class="table__customer__thead__tr">
                            <div class="table__customer__thead__tr__th" id="sort__customer__id" value="DESC">ID<i class="fa-solid fa-arrows-up-down"></i></div>
                            <div class="table__customer__thead__tr__th">Tên Khách Hàng</div>
                            <div class="table__customer__thead__tr__th">Số Đ.Thoại</div>
                            <div class="table__customer__thead__tr__th">Địa Chỉ</div>
                            <div class="table__customer__thead__tr__th" id="sort__customer__level" value="DESC">Loại Khách<i class="fa-solid fa-arrows-up-down"></i></div>
                            <div class="table__customer__thead__tr__th" id="sort__customer__date" value="DESC">Ngày Tạo<i class="fa-solid fa-arrows-up-down"></i></div>
                            <div class="table__customer__thead__tr__th">Status</div>
                        </div>
                    </div>
                    <div class="table__customer__tbody">
                    </div>
                </div>

                <!-- PAGINATION -->
                <div class="pagination__customer"></div>

                <!-- ALERT DELETE -->
                <div class="alert__delete__customer">
                    <div class="alert__delete__customer__icon">
                        <i class='bx bxs-trash'></i>
                    </div>
                    <div class="alert__delete__customer__title">
                        Want to delete this item?
                    </div>
                    <div class="alert__delete__customer__text">
                        You will not be able to recover this file!
                    </div>
                    <div class="alert__delete__customer__button__group">
                        <!-- <div class="alert__delete__customer__cancel">
                            Cancel
                        </div>
                        <div class="alert__delete__customer__delete" value="">
                            Delete
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="./script-admin.js"></script>
    <script src="./test-admin.js"></script>
    <script src="./customer-admin.js"></script>
</body>

</html>


<script src="../../Controller/admin/controller-admin.customer.js"></script>
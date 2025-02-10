function alertSuccess(notify) {
  $(".alert__notify__box__success__right__content").text(notify);
  $(".alert__notify__box__success").addClass("active");
  setTimeout(function () {
    $(".alert__notify__box__success__progress").addClass("active");
  }, 500);
  setTimeout(function () {
    $(".alert__notify__box__success").removeClass("active");
    $(".alert__notify__box__success__progress").removeClass("active");
  }, 5000);
  $(".alert__notify__box__success__close").click(function () {
    $(".alert__notify__box__success").removeClass("active");
    setTimeout(function () {
      $(".alert__notify__box__success__progress").removeClass("active");
    }, 300);
  });
}

function alertFailed(notify) {
  $(".alert__notify__box__failed__right__content").text(notify);
  $(".alert__notify__box__failed").addClass("active");
  setTimeout(function () {
    $(".alert__notify__box__failed__progress").addClass("active");
  }, 500);
  setTimeout(function () {
    $(".alert__notify__box__failed").removeClass("active");
    $(".alert__notify__box__failed__progress").removeClass("active");
  }, 5000);
  $(".alert__notify__box__failed__close").click(function () {
    $(".alert__notify__box__failed").removeClass("active");
    setTimeout(function () {
      $(".alert__notify__box__failed__progress").removeClass("active");
    }, 300);
  });
}
$(document).ready(function () {
  $(".Account__Register__Right__Error, .loading__box, .loading__bg").hide();

  $("#changePasswordForm").on("submit", function (e) {
    e.preventDefault();
    const password = $("#KH_MatKhauKhachHang").val(); // Lấy giá trị từ input

    if (password == "") {
      alertFailed("Mật khẩu không được để trống");
    }
    $.ajax({
      method: "POST",
      url: "../../controller/admin/controller-admin.info-customer.php",
      data: {
        KH_MatKhauKhachHang: password,
        //   updatePassWord: true
      },
      dataType: "text",
      success: function (response) {
        if (response !== "") {
          $("#KH_MatKhauKhachHang").val(response);
          alertSuccess("Mật khẩu đã được đổi thành công!");
        }
      },
      error: function (xhr, status, error) {
        alertFailed("Cập nhật mật khẩu thất bại. Try Again !");
      },
    });
  });

  // $("#updateInfoCustomerForm").on("submit", function (e) {
  //   // e.preventDefault();

  //   // Lấy giá trị từ các trường input
  //   const PhoneCustomer = $("#KH_SDTKhachHang").val();
  //   const AddressCustomer = $("#KH_DiaChiKhachHang").val();
  //   const EmailCustomer = $("#KH_EmailKhachHang").val();
  //   const NameCustomer = $("#KH_TenKhachHang").val();

  //   // Kiểm tra ràng buộc dữ liệu
  //   if (PhoneCustomer == "") {
  //     alertFailed("Số điện thoại không được để trống");
  //     return;
  //   }
  //   if (AddressCustomer == "") {
  //     alertFailed("Địa chỉ khách hàng không được để trống");
  //     return;
  //   }
  //   if (EmailCustomer == "") {
  //     alertFailed("Email khách hàng không được để trống");
  //     return;
  //   }
  //   if (NameCustomer == "") {
  //     alertFailed("Tên khách hàng không được để trống");
  //     return;
  //   }

  //   // Gửi AJAX request
  //   $.ajax({
  //     method: "POST",
  //     url: "../../controller/admin/controller-admin.info-customer.php",
  //     data: {
  //       KH_SDTKhachHang: PhoneCustomer,
  //       KH_DiaChiKhachHang: AddressCustomer,
  //       KH_EmailKhachHang: EmailCustomer,
  //       KH_TenKhachHang: NameCustomer,
  //       // KH_IDKhachHang: $id_customer,
  //       updateInfoCustomer: true,
  //     },
  //     dataType: "json", // Đổi về json nếu server trả json
  //     success: function (response) {
  //       console.log(response);
  //       if (response.success) {
  //         // Gán lại thông tin từ phản hồi
  //         $("#KH_SDTKhachHang").val(response.data.KH_SDTKhachHang);
  //         $("#KH_DiaChiKhachHang").val(response.data.KH_DiaChiKhachHang);
  //         $("#KH_EmailKhachHang").val(response.data.KH_EmailKhachHang);
  //         $("#KH_TenKhachHang").val(response.data.KH_TenKhachHang);
  //         console.log(response.data.KH_SDTKhachHang);
  //         alertSuccess("Cập nhật thông tin khách hàng thành công!");
  //       } else {
  //         alertFailed("Đã có lỗi xảy ra!");
  //       }
  //       console.log(error);  
  //     },
  //     error: function (xhr, status, error) {
  //       alertFailed("Cập nhật thông tin khách hàng thất bại!");
       
  //     },
 
  //   });
  // });
});

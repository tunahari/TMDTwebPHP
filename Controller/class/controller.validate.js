class ValidateData {
    constructor () {
    }

   /* Xác thực tên người dùng
   - Tên người dùng phải trên 5 ký tự, chỉ chứa chữ và số
   */ 
   validateUserName (username) {
       var usernameRegex = /^[a-zA-Z0-9]+$/;
       username = username.trim()
       if (username.length >= 5 && username.match(usernameRegex) !== null) {
           return true
       } else {
           return false
       }
   }

   /* Xác thực mật khẩu hợp lệ
   - Mật khẩu phải trên 5 ký tự, có chứa ký tự đặt biệt [!,@,#,$,%,&,*], chữ và số
   */ 
   validatePassword (password) {
       password = password.trim()
       var passwordRegex = /^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*\d)(?=\S*[^\w\s])\S{5,}$/
       if (passwordRegex.test(password)) {
           return true
       } else {
           return false
       }
   }

   /* Xác thực mật khẩu chính xác
   - Mật khẩu được băm nhỏ phải khớp với mật khẩu xác nhận
   */
    checkAccuratePassword (cfpassword, password) {
       cfpassword = cfpassword.trim()
       password = password.trim()
       if (password === cfpassword) {
           return true;
       } else {
           return false;
       }
   }

   /* Xác thực ngày tháng
   - Ngày tháng phải đúng định dạng dd/mm/yyyy 
   - Phải là ngày tồn tại
   */
    validateDate(date) {
       date = date.trim()
       var temp = date.split('-')
       var d = new Date(temp[1] + '-' + temp[0] + '-' + temp[2])
       return (d && (d.getDate() == Number(temp[0]) && d.getMonth() + 1) == temp[1] && d.getFullYear() == Number(temp[2]))
    }

   /* Xác thực số điện thoại
   - Số điện thoại phải đủ 10 ký tự
   - 10 ký tự phải là số nguyên, không âm
   - Số điện thoại đầu bằng số 0
   */

   isNumeric(value) {
       return /^\d+$/.test(value);
   }

   validatePhoneNumber (phone) {
       var regexPhone = /^\d+$/
       phone = phone.trim()
       if (phone.length === 10 && regexPhone.test(phone) === true) {
           return true;
       } else {
           return false;
       }
   }

    checkQuantity (quantity) {
        var regexQuantity = /^\d+$/
        quantity = quantity.trim()
        if (quantity.length > 0 && regexQuantity.test(quantity) === true) {
            return true;
        } else {
            return false;
        }
    }

    validateEmail (email) {
        email = email.trim()
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return true;
        } else {
            return false;
        }    
    }
}
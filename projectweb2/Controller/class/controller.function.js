class HandlingFunctions {
    constructor() {
    }

    /**
     * Hàm sử dụng để gởi và nhận dữ liệu với server bằng AJAX với phương thức POST
     * @param {*} url : đường dẫn của trang server ( STRING )
     * @param {*} data : dữ liệu cần gởi bằng AJAX qua server ( ANY )
     * @returns : Trả về response từ server, nhận lấy trong hàm 'done'
     */
    /*
    getAjaxPost(url, data).done(function(response){
        console.log(response);
    });
    */
    getAjaxPost(url, data){
        return $.ajax({
            type: 'POST',
            url : url,              
            data: data,
            success: function(response) {}
        })
    }

    /**
     * Hàm sử dụng để gởi và nhận dữ liệu với server bằng AJAX với phương thức GET
     * @param {*} url : đường dẫn của trang server ( STRING )
     * @param {*} data : dữ liệu cần gởi bằng AJAX qua server ( ANY )
     * @returns : Trả về response từ server, nhận lấy trong hàm 'done'
     */
    /*
        getAjaxGet(url, data).done(function(response){
            console.log(response);
        });
    */
    getAjaxGet(url, data){
        return $.ajax({
            type: 'GET',
            url : url,              
            data: data,
            success: function(response) {}
        })
    }


    /**
     * Hàm dùng để Xác thực định dạng file jpg , jpeg , png
     * @param {*} idInputFile : tên id phần tử input tyle là file ( STRING not "#" )
     * @returns : Nếu định dạng file đúng, trả về true, ngược lại trả về false
     */
    fileValidation(idInputFile){
        var fileInput = document.getElementById(idInputFile)
        var filePath = fileInput.value
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i
        if(!allowedExtensions.exec(filePath)){
        fileInput.value = ''
        return false
        } else {
            return true
        }
    }

    /**
     * Hàm dùng để gởi và nhận một file bằng AJAX tới server
     * @param {*} url : đường dẫn của trang server ( STRING )
     * @param {*} fileElm : html input type là file ( HTML )
     * @param {*} filePost : dùng để nhận $_FILES['filePost'] ( STRING ) 
     */
    getAjaxFile (url, fileElm, filePost) {
        var fileData = fileElm.prop('files')[0]; 
        var formData = new FormData()                
        formData.append(filePost , fileData)
        var fileResponse = '';
        if (fileData !== undefined) {
            $.ajax({
                url: url,
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: formData,                    
                type: 'POST',
                async: false,
                success: function(response){
                    fileResponse = response.trim()
                }
            })
        }  
        return fileResponse   
    }

    /**
     * Hàm dùng để hiển thị một file trước khi lưu vào CSDL 
     * @param {*} event : event trong hàm onchange của input type là file ( PARAM )
     * @param {*} idInputFile : tên id phần tử input type là file ( STRING not "#" )
     * @param {*} idPreview : tên id phần tử chứa preview ( STRING not "#" )
     * @returns : Nếu định dạng file đúng, trả về true, ngược lại trả về false
     */
    previewFile (event, idInputFile, idPreview) {
        const handlingFunctions = new HandlingFunctions()
        if (handlingFunctions.fileValidation(idInputFile) === true) {
            var reader = new FileReader()
            reader.onload = function() {
            document.getElementById(idPreview).innerHTML += '<img id="image-preview" src="'+reader.result+'">'
            }
            reader.readAsDataURL(event.target.files[0])
            return true
        } else {
            return false
        }
    }

    /*  <input type="file" id="inputMultiFileUpload" multiple >
        <button type="button" id="submitMultiFileUpload">Upload</button>

        $('#submitMultiFileUpload').click(function() {
            var fileElm = $('#inputMultiFileUpload')
            var url = '../../../backend/backend-user/backend.uploadfile.php'
            var notifyElm = $('#notifyMultiFileUpload')
            var fileData = fileElm.prop("files")
            for (var i = 0; i < fileData.length; i++) {
                if(i === fileData.length - 1){
                    handlingFunctions.getAjaxMultiFile(fileData.length - 1, 0, fileElm, url, notifyElm, 100000)
                }
            }
        })
    */

    /**
     * Hàm dùng để gởi và nhận nhiều file bằng AJAX tới server
     * @param {*} ttl : tổng số file tải lên ( NUMBER )
     * @param {*} cl : đại diện cho từng file tải lên ( INDEX )
     * @param {*} fileElm : html input type là file ( HTML )
     * @param {*} url : đường dẫn của trang server ( STRING )
     * @param {*} notifyElm : html thông báo ( HTML )
     * @param {*} timeOut : thời gian hiển thị thông báo (tính bằng ms) ( NUMBER )
     * @param {*} filePost : dùng để nhận $_FILES['filePost'] ( STRING ) 
     */

    getAjaxMultiFile (ttl, cl, fileElm, url, notifyElm, timeOut, filePost) {
        const handlingFunctions = new HandlingFunctions()
        notifyElm.hide()
        var fileData = fileElm.prop("files")
        var formData =  new FormData()
        formData.append(filePost, fileData[cl])
        $.ajax({
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            data: formData,
            type: 'POST', 
            success: function (response, status) {
                if (status == 'success') {
                    if (cl < ttl) {
                        handlingFunctions.getAjaxMultiFile(ttl, cl + 1, fileElm, url, notifyElm, timeOut)
                    } else {
                        notifyElm.show()
                        notifyElm.text(response)
                        setTimeout(function(){
                            notifyElm.hide()
                        },timeOut)
                    }
                }
            }  
        })
    }

    /**
     * Hàm dùng để hiển thị nhiều file trước khi lưu vào CSDL 
     * @param {*} event : event trong hàm onchange của input type là file ( PARAM )
     * @param {*} idInputFile : tên id phần tử input type là file ( STRING not "#" )
     * @param {*} idPreview : tên id phần tử chứa preview ( STRING not "#" )
     * @returns : Nếu định dạng file đúng, trả về true, ngược lại trả về false
     */
    previewMultiFile(event, idInputFile, idPreview){
        const handlingFunctions = new HandlingFunctions()
        if (handlingFunctions.fileValidation(idInputFile) === true) {
            var inputMultiFile = document.getElementById(idInputFile)
            for(var i = 0; i < inputMultiFile.files.length; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById(idPreview).innerHTML += '<img src="'+urls+'">'
            }
            return true
        } else {
            return false
        }
    }

    
}
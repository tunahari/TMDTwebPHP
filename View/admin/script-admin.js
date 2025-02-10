// ====PHẦN QUẢN LÝ SẢN PHẨM===========
// NHẤN VÀO ICON SHOW HIỆN THÔNG TIN
const edit__admin__product = document.querySelectorAll(".show__icon")
for(let i=0;i<edit__admin__product.length;i++){
    edit__admin__product[i].addEventListener("click", ()=>{
    document.getElementsByClassName("table__click--show")[i].classList.add("active")
    })
}


// const exit__admin__product = document.querySelector(".exit__CT--admin")
// exit__admin__product.addEventListener("click", ()=>{
//     document.querySelector(".table__click--show").classList.remove("active")
// })

const input__hide = document.querySelectorAll(".edit__product--show.des")
const abc = document.querySelector(".des__box--title h4")
const abbv = document.querySelector("#title__input")
for(let i=0;i<input__hide.length;i++){
    input__hide[i].addEventListener("click", ()=>{
    document.getElementsByClassName("cnpm")[i].classList.toggle("active")
    document.getElementsByClassName("check__submit")[i].classList.toggle("active")
})
}

// CHỈNH SỬA ẢNH IMG TRONG QLSP

// const edit__img= document.querySelector(".edit__product--show.img")
// edit__img.addEventListener("click", ()=>{
//     document.querySelector(".edit__img--container").classList.toggle("active")
// })

const click__check = document.querySelectorAll(".check__icon")
for(let i=0;i<click__check.length;i++){
    click__check[i].addEventListener("click", ()=>{
    document.querySelector(".cnpm").classList.remove("active")
    document.querySelector(".check__submit").classList.remove("active")
})
}

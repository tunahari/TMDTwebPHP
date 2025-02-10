// const click__menu_drow = document.querySelector(".nav__left--menu")
// const drow__click=  document.querySelectorAll(".menu--click")
// click__menu_drow.addEventListener("click", ()=>{
//    for(let i=0;i<drow__click.length;i++){
//        if(drow__click[i].style.display=="none"){
//         document.querySelector(".nav__menu").classList.remove("drow")
//         document.getElementsByClassName("menu--click")[i].style.display='block'
//        }
//        else{
//         document.querySelector(".nav__menu").classList.add("drow")
//         // drow__click[i].style.display=="none"
//         document.getElementsByClassName("menu--click")[i].style.display='none'
//        }
//    }
// })

const click__menu_drow = document.querySelector(".nav__left--menu")
const drow__click=  document.querySelectorAll(".menu--click")
click__menu_drow.addEventListener('click', ()=>{
   for(let i=0;i<drow__click.length;i++){
       if(drow__click[i].style.display=="none"){
        document.querySelector(".nav__menu--container").classList.remove("drow")
        document.getElementsByClassName("menu--click")[i].style.display='block'
       }
       else{
        document.querySelector(".nav__menu--container").classList.add("drow")
        document.getElementsByClassName("menu--click")[i].style.display='none'
       }
   }
})

const click__calendar = document.querySelectorAll(".select__y_m_d")
for(let i=0;i<click__calendar.length;i++){
    click__calendar[i].addEventListener("click", ()=>{
    document.getElementsByClassName("box__input--date")[i].classList.toggle("active")
    })
}

function doiMauBackGround(){
    const tr_table= document.querySelectorAll(".tr_white")
    for(let i=0;i<tr_table.length;i++){
        if(i % 2 ==0)
        {
            tr_table[i].style.background="white"
            tr_table[i].style.color="black"
        }
    }
}
doiMauBackGround()

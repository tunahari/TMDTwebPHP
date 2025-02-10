$(document).ready(function() {
    /* =============================== Remember account =============================== */ 
    $('.Account__Login__Right__Remember__Box__Left label').click(function (){
        $('.Account__Login__Right__Remember__Box__Left').toggleClass('active')
    }) 

    /* =============================== Loading Animate =============================== */ 
    $('.Account__Login__Right__Loading, .Account__Login__Right__Alert__Failed, .Account__Login__Right__Alert__Success').hide()
})
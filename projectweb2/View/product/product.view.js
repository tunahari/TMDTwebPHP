var swiper = new Swiper(".Product__Page__Content__Right__Swipper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
  })
  
  var swiper = new Swiper(".Product__Page__Content__2__SpecialTrend__Swipper", {
    navigation: {
      nextEl: ".SpecialTrend__Swipper__Next",
      prevEl: ".SpecialTrend__Swipper__Prev",
    },
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    breakpoints: {  
      '600': {
      slidesPerView: 2,
      spaceBetween: 10,
      },
      '1024': {
      slidesPerView: 3,
      spaceBetween: 10,
      },
    },
  })            
  const listPaging = document.querySelectorAll('.swiper-pagination-bullet')
  listPaging.forEach(e => {
      e.innerHTML = `
      <div class="Slide__Pagination__Item">
          <div class="Slide__Pagination__Item__Title">Makeup Store</div>
          <div class="Slide__Pagination__Item__Text">Best Selling Products</div>
      </div>
      `
  })

$(document).ready(function () {
    $('.Product__Page__Header__Bottom__Filter__Bar').click(function() {
        $('.Product__Page__Content__Left').addClass('active')
        $('.BackGround__Body').addClass('active')
    })
    $('.Product__Page__Content__Left__Close').click(function() {
        $('.Product__Page__Content__Left').removeClass('active')
        $('.BackGround__Body').removeClass('active')
    })
    $('.BackGround__Body').click(function() {
        $('.Product__Page__Content__Left').removeClass('active')
        $('.BackGround__Body').removeClass('active')
    })
}) 

const rangeInput = document.querySelectorAll('.Product__Page__Content__Left__Filter__Price__Range__Input input')
const priceInpput = document.querySelectorAll('.Product__Page__Content__Left__Filter__Price__Input__Number input')
const progress = document.querySelector('.Product__Page__Content__Left__Filter__Price__Input__Range__Progress')
let priceGap = 1000

priceInpput.forEach(input => {
    input.addEventListener('input', e => {
        let minValue = parseInt(priceInpput[0].value)
        let maxValue = parseInt(priceInpput[1].value)
        if ((maxValue - minValue >= priceGap) && maxValue <= 5000) {
            if (e.target.className === 'Filter__Price__Input__Number__Min') {
                rangeInput[0].value = minValue
                progress.style.left = (minValue / rangeInput[0].max)* 100 + '%'
            } else {
                rangeInput[1].value = maxValue
                progress.style.right = 100 - (maxValue / rangeInput[1].max)* 100 + '%'
            }
        }
    })
})

rangeInput.forEach(input => {
    input.addEventListener('input', e => {
        let minValue = parseInt(rangeInput[0].value)
        let maxValue = parseInt(rangeInput[1].value)
        if (maxValue - minValue < priceGap) {
            if (e.target.className === 'Filter__Price__Input__Range__Min') {
                rangeInput[0].value = maxValue - priceGap
            } else {
                rangeInput[1].value = minValue + priceGap
            }
        } else {
            priceInpput[0].value = minValue
            priceInpput[1].value = maxValue
            progress.style.left = (minValue / rangeInput[0].max)* 100 + '%'
            progress.style.right = 100 - (maxValue / rangeInput[1].max)* 100 + '%'
        }
    })
})
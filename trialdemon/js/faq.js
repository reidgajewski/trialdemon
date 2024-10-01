const button1 = document.getElementById('accordion-button-1')
const body1 = document.getElementById('accordion-body-1')
const open1 = document.getElementById('1open')
const close1 = document.getElementById('1close')

const button2 = document.getElementById('accordion-button-2')
const body2 = document.getElementById('accordion-body-2')
const open2 = document.getElementById('2open')
const close2 = document.getElementById('2close')

const button3 = document.getElementById('accordion-button-3')
const body3 = document.getElementById('accordion-body-3')
const open3 = document.getElementById('3open')
const close3 = document.getElementById('3close')

const button4 = document.getElementById('accordion-button-4')
const body4 = document.getElementById('accordion-body-4')
const open4 = document.getElementById('4open')
const close4 = document.getElementById('4close')

const button5 = document.getElementById('accordion-button-5')
const body5 = document.getElementById('accordion-body-5')
const open5 = document.getElementById('5open')
const close5 = document.getElementById('5close')

const button6 = document.getElementById('accordion-button-6')
const body6 = document.getElementById('accordion-body-6')
const open6 = document.getElementById('6open')
const close6 = document.getElementById('6close')

button1.addEventListener('click', function() {

    if(button1.getAttribute("aria-expanded") === "false") {
        body1.style.display = 'block'
        button1.setAttribute("aria-expanded", "true")
        close1.style.display = 'none'
        open1.style.display = 'block'
    } else
    if(button1.getAttribute("aria-expanded") === "true") {
        
        body1.style.display = 'none'
        button1.setAttribute("aria-expanded", "false")
        close1.style.display = 'block'
        open1.style.display = 'none'
       
    }

})

button2.addEventListener('click', function() {

    if(button2.getAttribute("aria-expanded") === "false") {
        body2.style.display = 'block'
        button2.setAttribute("aria-expanded", "true")
        close2.style.display = 'none'
        open2.style.display = 'block'
    } else
    if(button2.getAttribute("aria-expanded") === "true") {
        body2.style.display = 'none'
        button2.setAttribute("aria-expanded", "false")
        close2.style.display = 'block'
        open2.style.display = 'none'
    }

})

button3.addEventListener('click', function() {

    if(button3.getAttribute("aria-expanded") === "false") {
        body3.style.display = 'block'
        button3.setAttribute("aria-expanded", "true")
        close3.style.display = 'none'
        open3.style.display = 'block'
    } else
    if(button3.getAttribute("aria-expanded") === "true") {
        body3.style.display = 'none'
        button3.setAttribute("aria-expanded", "false")
        close3.style.display = 'block'
        open3.style.display = 'none'
    }
})

button4.addEventListener('click', function() {

    if(button4.getAttribute("aria-expanded") === "false") {
        body4.style.display = 'block'
        button4.setAttribute("aria-expanded", "true")
        close4.style.display = 'none'
        open4.style.display = 'block'
    } else
    if(button4.getAttribute("aria-expanded") === "true") {
        body4.style.display = 'none'
        button4.setAttribute("aria-expanded", "false")
        close4.style.display = 'block'
        open4.style.display = 'none'
    }
})

button5.addEventListener('click', function() {

    if(button5.getAttribute("aria-expanded") === "false") {
        body5.style.display = 'block'
        button5.setAttribute("aria-expanded", "true")
        close5.style.display = 'none'
        open5.style.display = 'block'
    } else
    if(button5.getAttribute("aria-expanded") === "true") {
        body5.style.display = 'none'
        button5.setAttribute("aria-expanded", "false")
        close5.style.display = 'block'
        open5.style.display = 'none'
    }
})


button6.addEventListener('click', function() {

    if(button6.getAttribute("aria-expanded") === "false") {
        body6.style.display = 'block'
        button6.setAttribute("aria-expanded", "true")
        close6.style.display = 'none'
        open6.style.display = 'block'
        button6.classList.toggle("rounded-b-xl");
    } else
    if(button6.getAttribute("aria-expanded") === "true") {
        body6.style.display = 'none'
        button6.setAttribute("aria-expanded", "false")
        close6.style.display = 'block'
        open6.style.display = 'none'
        button6.classList.toggle("rounded-b-xl");
    }
})


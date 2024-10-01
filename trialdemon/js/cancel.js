// mobile stuff
const mobileOpen = document.getElementById("mobileOpen");
const mobileClose = document.getElementById("mobileClose");
const mobileMenu = document.getElementById("mobile-menu");
const mobileButton = document.getElementById("mobileButton");

mobileButton.addEventListener('click', () => {
    const status = mobileButton.getAttribute("aria-expanded")
    if(status === "false") {
        mobileOpen.style.display = "none";
        mobileMenu.style.display = "block";
        mobileClose.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "true");
    } else if(status === "true") {
        mobileClose.style.display = "none";
        mobileMenu.style.display = "none";
        mobileOpen.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "false");
    }
  })

// desktop stuff
const desktopClosed = document.getElementById("desktopClosed");
const desktopOpen = document.getElementById("desktopOpen");
const desktopDropdownButton = document.getElementById("desktopDropdownButton");
const desktopDropdown = document.getElementById("desktopDropdown");

desktopDropdownButton.addEventListener('click', () => {
    if(desktopDropdownButton.getAttribute("aria-expanded") === "false") {
        desktopDropdownButton.setAttribute("aria-expanded", "true");
        desktopDropdown.style.display = "block";
        desktopClosed.style.display = "none";
        desktopOpen.style.display = "block";
    } else {
        desktopDropdownButton.setAttribute("aria-expanded", "false");
        desktopDropdown.style.display = "none";
        desktopOpen.style.display = "none";
        desktopClosed.style.display = "block";
    }
})

// billing portal
const cancelSub = document.getElementById("cancelSub");
cancelSub.addEventListener('click', function() {

    fetch('https://www.trialdemon.com/api/model.php?action=launchPortal', {
        method: 'GET',
    })
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            console.log(data);
        } else if(response == 200) {
            console.log(data)
            window.location.assign(data)
        }   
    })
});

// change color
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
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
        cancelSub.style.backgroundColor = '#ff5959'
        cancelSub.style.color = '#ffffff'
        cancelSub.disabled = false
    } else
    if(button6.getAttribute("aria-expanded") === "true") {
        body6.style.display = 'none'
        button6.setAttribute("aria-expanded", "false")
        close6.style.display = 'block'
        open6.style.display = 'none'
        button6.classList.toggle("rounded-b-xl");
    }
})

// Two weeks free stuff
const modal = document.getElementById('twoFree-modal')
const twoFreeButton = document.getElementById('twoFree')
const close = document.getElementById('close')

twoFreeButton.addEventListener('click', function() {
    modal.style.display = 'block'
})

close.addEventListener('click', function() {
    modal.style.display = 'none'
})


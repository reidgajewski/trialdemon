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


// main functions
const mainButton = document.getElementById("mainButton")
const refCodeHolder = document.getElementById("refCodeHolder")
const copied = document.getElementById("copied")
const balanceDiv = document.getElementById("balanceDiv")
const balance = document.getElementById("balance")
const cashoutmodal = document.getElementById("cashout-modal")
const cashout = document.getElementById("cashout")
const cashoutCancel = document.getElementById("cashoutCancel")
const subHeading = document.getElementById("subHeading")

// filling dashboard
window.addEventListener("load", function() {
    fetch('https://www.trialdemon.com/api/model.php?action=referralDashboard', {
        method: 'GET',
    })
    .then(response => {
        return response.json();
    }).then(json => {
        console.log(json)
        const users_refCode = json["users_refCode"]; 
        const users_refBalance = json["users_refBalance"];
        if(users_refCode == 0) {
            subHeading.innerHTML = "Generate a referral link and receive a $10 gift"
            mainButton.innerHTML = "Generate Referral Link"
        } else {
            subHeading.innerHTML = "Earn $5 for every person that subscribes using your referral link"
            mainButton.innerHTML = "Copy Referral Link"
            refCodeHolder.innerHTML = "https://www.TrialDemon.com/index?referral=" + users_refCode
            balance.innerHTML = users_refBalance
            balanceDiv.style.display = "block"
            cashout.style.display = "block"
        }
    })
});

mainButton.addEventListener("click", function() {
    if(refCodeHolder.innerHTML.length > 5) {
        navigator.clipboard.writeText(refCodeHolder.innerHTML);
        copied.style.visibility = "visible";
        setTimeout(function(){
        copied.style.visibility = "hidden";
        },2500);
    } else {
        fetch('https://www.trialdemon.com/api/model.php?action=newRefCode', {
            method: 'GET',
        })
        .then(res => {
            response = res.status
            return res.text()
        })
        .then(data => {
            if(response != 200) {
            } else {
                location.href="./referral";
            }
        })

    }
})

cashout.addEventListener("click", function() {
    cashoutmodal.style.display = "block"
})

cashoutCancel.addEventListener("click", function() {
    cashoutmodal.style.display = "none"
})



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


// filling dashboard
// get portal redirect
const loadSpinnerPortal = document.getElementById('loadSpinnerPortal')
const openPortal = document.getElementById("openBillingPortal")
const portalClose = document.getElementById("portalClose")
function displayLoader() {
    loadSpinnerPortal.style.display = "block";
}

function hideLoader() {
    loadSpinnerPortal.style.display = "none";
}
openPortal.addEventListener('click', function() {

    fetch('https://www.trialdemon.com/api/model.php?action=launchPortal', {
        method: 'GET',
    }).then(displayLoader())
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

portalClose.addEventListener('click', function() {
    paymentFailedModal.style.display = "none"
});

// filling out the dashboard
const welcomeHeader = document.getElementById("welcomeHeader");
const firstName = document.getElementById("firstName");
const welcomeText = document.getElementById("welcomeText");
const buttonText = document.getElementById("buttonText");
const headerButton = document.getElementById("headerButton");

const cardDetails = document.getElementById("cardDetails");
const cardnum = document.getElementById("cardnum");
const cardcvc = document.getElementById("cardcvc");
const cardexp = document.getElementById("cardexp");

const contactInfo = document.getElementById("contactInfo");
const email = document.getElementById("email");
const emailBox = document.getElementById("emailBox");
const emailInfo = document.getElementById("emailInfo");
const address = document.getElementById("address");
const city = document.getElementById("city");
const state = document.getElementById("state");
const zip = document.getElementById("zip");

const statusBar = document.getElementById("statusBar");

const timeLeft = document.getElementById("timeLeft");

const checkEmailLoader = document.getElementById("checkEmailLoader")

const paymentFailedModal = document.getElementById("paymentFailed-modal")

const headerButtonAction = document.getElementById("headerButtonAction");

const mainLoader = document.getElementById("mainLoader");
const heroSection = document.getElementById("heroSection");

const helperCard = document.getElementById("helperCard")

const testi = document.getElementById("testi")

function hideMainLoader() {
    mainLoader.style.display = "none";
}


window.addEventListener("load", function() {
    fetch('https://www.trialdemon.com/api/model.php?action=dashboard', {
        method: 'GET',
    })
    .then(response => {
        return response.json();
    }).then(json => {
        const welcomeHeaderText = json["welcomeHeader"];
        const users_firstName = json["users_firstName"];
        const welcomeTextText = json["welcomeText"];
        const buttonTextText = json["buttonText"];
        const headerButtonHref = json["headerButtonHref"]

        const users_timeLeft = json["timeLeft"]
        const users_canGenerate = json["canGenerate"]
        const users_SubscriptionStatus = json["users_SubscriptionStatus"]
        
        const users_cardNumber = json["users_cardNumber"];
        const users_cardCvc = json["users_cardCvc"];
        const users_cardExp = json["users_cardExp"];
        const users_hasCard = json["hasCard"];

        const users_verified = json["users_verified"];

        const users_tempEmail = json["tempEmail"];
        const users_address = json["address"];
        const users_city = json["city"];
        const users_state = json["state"];
        const users_zip = json["zip"];

        const paymentFailed = json["paymentFailed"]

        heroSection.style.display = "block";

        //email.innerHTML = users_tempEmail;
        address.innerHTML = users_address;
        city.innerHTML = users_city;
        state.innerHTML = users_state;
        zip.innerHTML = users_zip;
        emailInfo.innerHTML = users_tempEmail;

        firstName.innerHTML = users_firstName;
        welcomeHeader.innerHTML = welcomeHeaderText;
        welcomeText.innerHTML = welcomeTextText;

        timeLeft.innerHTML = users_timeLeft;

        headerButtonAction.href = headerButtonHref;

        if(users_SubscriptionStatus === "0") {
            orTry.style.display = "block";
            testi.style.display = "block"
        }

        if(users_verified == 1 && users_hasCard == 1 && users_SubscriptionStatus === "1") {
            newcard.style.display = "block"
            newemail.style.display = "block"
            checkemail.style.display = "block"
            heroSection.style.display = "none";
            helperCard.style.display = "block";
            linkTrialList.style.display = "block";
            support.style.display = "block";
            tutorial.style.display = "block";
            linkReferral.style.display = "block";
        }

        if(buttonTextText != null) {
            headerButton.style.display = "block";
            buttonText.innerHTML = buttonTextText;
        } else {
            headerButton.style.display = "none";
        }

        if(users_hasCard === "1" && users_verified === "1" && users_SubscriptionStatus === "1") {
            cardDetails.style.display = "block";
            contactInfo.style.visibility = "visible";
            emailBox.style.display = "block";
        
            cardnum.innerHTML = users_cardNumber;
            cardcvc.innerHTML = users_cardCvc;
            cardexp.innerHTML = users_cardExp;
        }

        if(paymentFailed == 1 && users_city != null) {
            paymentFailedModal.style.display = "block"
        }


       hideMainLoader();
    })
});




// defining modal vars
const cardmodal = document.getElementById("card-modal");
const emailmodal = document.getElementById("email-modal");
const supportmodal = document.getElementById("support-modal");




// Hiding and showing modals with buttons
const newcard = document.getElementById("newcard");
const newemail = document.getElementById("newemail");
const checkemail = document.getElementById("checkemail");
const linkTrialList = document.getElementById("linkTrialList");
const orTry = document.getElementById("orTry");
const support = document.getElementById("support");
const tutorial = document.getElementById("tutorial");
const linkReferral = document.getElementById("linkReferral");

const modalBg = document.getElementById("modalBg");

const emailCancel = document.getElementById("emailCancel");
const cardCancel = document.getElementById("cardCancel");
const supportCancel = document.getElementById("supportCancel");

newcard.addEventListener('click', () => {
    cardmodal.style.display = "block";
    
})

newemail.addEventListener('click', () => {
    emailmodal.style.display = "block";
})

cardCancel.addEventListener('click', () => {
    cardmodal.style.display = "none";
    hideError();
})

emailCancel.addEventListener('click', () => {
    emailmodal.style.display = "none";
    hideError();
})

support.addEventListener('click', () => {   
    supportmodal.style.display = "block";
})

supportCancel.addEventListener('click', () => {
    supportmodal.style.display = "none";
})





// modal action buttons
const generateNewCard = document.getElementById("generateNewCard");
const generateNewEmail = document.getElementById("generateNewEmail");




// modal error
const errorDiv = document.getElementById("error_div");
const errorText = document.getElementById("error_text");

function displayError(errorData) {
    errorDiv.style.visibility = "visible";
    errorText.innerHTML = errorData;
}

function hideError() {
    errorDiv.style.visibility = "hidden";
}



// new card
function loadSpinnerCard() {
    const cardLoader = document.getElementById("loadSpinnerCard");
   
    cardLoader.style.display = "block";
}

function hideSpinnerCard() {
    const cardLoader = document.getElementById("loadSpinnerCard");
   
    cardLoader.style.display = "none";
}

generateNewCard.addEventListener('click', () => {
    fetch('https://www.trialdemon.com/api/model.php?action=generatenewcard', {
        method: 'GET',
    }).then(loadSpinnerCard())
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            hideSpinnerCard();
            const cardErrorMessage = "You cannot generate a new card yet"
            displayError(cardErrorMessage);
           
        } else {
            hideError();
            hideSpinnerCard();
            location.href="./dashboard";
        }
    })
})




// new email
function loadSpinnerEmail() {
    const emailLoader = document.getElementById("loadSpinnerEmail");
   
    emailLoader.style.display = "block";
}

function hideSpinnerEmail() {
    const emailLoader = document.getElementById("loadSpinnerEmail");
   
    emailLoader.style.display = "none";
}

generateNewEmail.addEventListener('click', () => {
    fetch('https://www.trialdemon.com/api/model.php?action=newemail', {
        method: 'GET',
    }).then(loadSpinnerEmail())
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            displayError(data);
            hideSpinnerEmail();
           
        } else {
            location.href="./dashboard";
        }
    })
})

rightArrow = document.getElementById("rightArrow");
checkemail.addEventListener('click', () => {

    fetch('https://www.trialdemon.com/api/model.php?action=checkemail', {
        method: 'GET',
    })
    .then(rightArrow.style.display = "none")
    .then(checkEmailLoader.style.display = "block")
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            rightArrow.style.display = "block"
            checkEmailLoader.style.display = "none"
            alert("Inbox is empty. Try again in a few moments.")
        } else {
            checkEmailLoader.style.display = "none"
            rightArrow.style.display = "block"

            //regex to replace ' with " from (https://stackoverflow.com/a/68715699/2465644)
            data = data.replaceAll("'",'"');

            document.getElementById("checkEmailModal").style.display="block"
            document.getElementById("emailBoxx").innerHTML = `<iframe id="emailiframe" class="width="300" height="500"" srcdoc='${data}'></iframe>`;

    
       
        }
    })
})


const checkClose = document.getElementById("checkClose")

checkClose.addEventListener('click', () => {
    document.getElementById("checkEmailModal").style.display="none"
})


// gift modal
const giftModal = document.getElementById("giftModal")
linkReferral.addEventListener("click", () => {
    giftModal.style.display="block"
})

const clickMe = document.getElementById("clickMe")
clickMe.addEventListener("click", () => {
    giftModal.style.display="block"
})
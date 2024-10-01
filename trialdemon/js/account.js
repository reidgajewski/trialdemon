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




const email = document.getElementById("email");
const phone = document.getElementById("phone");

const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const address = document.getElementById("address");
const city = document.getElementById("city");
const state = document.getElementById("state");
const zip = document.getElementById("zip");

const subInfoLabel = document.getElementById("subInfoLabel");

window.addEventListener("load", function() {
    fetch('https://www.trialdemon.com/api/model.php?action=getAccount', {
        method: 'GET',
    })
    .then(response => {
        return response.json();
    }).then(json => {


        
        const users_email = json["users_email"];
 

        const users_firstName = json["users_firstName"];
        const users_lastName = json["users_lastName"];
        const users_address = json["address"];
        const users_city = json["city"];
        const users_state = json["state"];
        const users_zip = json["zip"];

 

        email.value = users_email;
        firstname.value = users_firstName;
        lastname.value = users_lastName;
        address.value = users_address;
        city.value = users_city;
        state.value = users_state;
        zip.value = users_zip;

    })
});



// update cardholder
const update = document.getElementById("update");
function displayLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.display = "block";
    lockIcon.style.display = "none";
}

function hideLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.display = "none";
    lockIcon.style.display = "block";
}

function displaySuccess() {
    const successDiv = document.getElementById("success_div");

    successDiv.style.visibility = ("visible");

    setTimeout(function(){
        successDiv.style.visibility = "hidden";
    },2500);
}

function displayError() {
    const errorDiv = document.getElementById("error_div");

    errorDiv.style.visibility = "visible";

    setTimeout(function(){
        errorDiv.style.visibility = "hidden";
    },3500);
}

var response
update.addEventListener('click', () => {
    const formData = new FormData(document.getElementById("updateCardHolderForm"));

    fetch('https://www.trialdemon.com/api/model.php', {
        method: 'POST',
        body: formData
    })
    .then(displayLoader())
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            displayError();
            hideLoader();
        } else {
            displaySuccess();
            hideLoader();
        }
    })
})


// subscription info
const subscriptionHeader = document.getElementById("subscriptionHeader")
const openPortal = document.getElementById('openPortal');
window.addEventListener("load", function() {
    fetch('https://www.trialdemon.com/api/model.php?action=getSubscriptionInfo', {
        method: 'GET',
    })
    .then(response => {
        return response.json();
    }).then(json => {

        console.log(json)

        const header = json["header"];
        const isCustomer = json["isCustomer"]
        subscriptionHeader.innerHTML = header;

        if(isCustomer === true) {
            openPortal.style.display = "block"
        }


    })
});

// get portal redirect
const subSpinner = document.getElementById('subSpinner')
function displayLoader() {
    subSpinner.style.display = "block";
}

function hideLoader() {
    subSpinner.style.display = "none";
}
openPortal.addEventListener('click', function() {
    cancelModal.style.display = "block";
});

// modal actions
// modal name
const cancelModal = document.getElementById("cancel-modal");
// go to billing button
const noBilling = document.getElementById("no-billing");
// gp to cancel subscription button
const cancelSub = document.getElementById("cancelSub");
// close modal button
const cancelClose = document.getElementById("cancelClose");


noBilling.addEventListener('click', function() {

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

cancelClose.addEventListener('click', function() {
    cancelModal.style.display = "none";
});



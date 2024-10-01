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

function displayLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.visibility = "visible";
}

function hideLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.visibility = "hidden";
}

const mockCard = document.getElementById("mockCard");
var response
mockCard.addEventListener('click', () => {

    fetch('https://www.trialdemon.com/api/model.php?action=newcard', {
        method: 'GET',
    }).then(displayLoader())
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            const statusDiv = document.getElementById("newCard_status_div");
            const statusText = document.getElementById("newCard_status");
            statusText.innerHTML = data;
            statusDiv.style.visibility = "visible";
            console.log(data);
            hideLoader();
           
        } else {
            const statusDiv = document.getElementById("newCard_status_div");
            const statusText = document.getElementById("newCard_status");
            statusDiv.style.visibility = "hidden";
            fetch('https://www.trialdemon.com/api/model.php?action=newemail', {
                method: 'GET',
            })
            .then(res => {
                response = res.status
                return res.text()
            })
            .then(data => {
                if(response != 200) {
                    statusText.innerHTML = data;
                    statusDiv.style.visibility = "visible";
                    hideLoader()
                
                } else {
                    location.href="./tutorial";
                }
            })
        }
    })
})
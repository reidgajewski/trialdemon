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

const confirm = document.getElementById("confirm");
var response
confirm.addEventListener('click', (e) => {
    e.preventDefault();
    const formData = new FormData(document.getElementById("confirmCodeForm"));

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
            hideLoader();
            const statusDiv = document.getElementById("confirm_status_div");
            const statusText = document.getElementById("confirm_status");
            statusText.innerHTML = data;
            statusDiv.style.display = "block";
        } else {
            hideLoader();
            location.href="./dashboard";

        }
    })
})

const resend = document.getElementById("resendCode");
resend.addEventListener('click', () => {
 
    fetch('https://www.trialdemon.com/api/model.php?action=resendCode', {
        method: 'GET',
    })

})
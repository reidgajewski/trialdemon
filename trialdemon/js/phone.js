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

const sendCode = document.getElementById("submit");
var response
sendCode.addEventListener('click', () => {
    const formData = new FormData(document.getElementById("addPhoneForm"));

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
            const statusDiv = document.getElementById("phone_status_div");
            const statusText = document.getElementById("phone_status");
            statusText.innerHTML = data;
            statusDiv.style.display = "block";
        } else {
            hideLoader();
            location.href="./entercode";
        }
    })
})

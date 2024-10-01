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

const login = document.getElementById("login")
var response
login.addEventListener('click', () => {
    const formData = new FormData(document.getElementById("form"));

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
            console.log(data);
            const statusDiv = document.getElementById("login_status_div");
            const statusText = document.getElementById("login_status");
            statusText.innerHTML = data;
            statusDiv.style.display = "block";
            hideLoader();
        } else {
            hideLoader();
            const urlParams = new URLSearchParams(window.location.search);
            const next = urlParams.get('next');
            if(next != null) {
                location.href="./" + next;
            } else {
                location.href="./dashboard";
            }
           
        }
    })
})

const forgotPassword = document.getElementById("forgotPassword")
const passwordModal = document.getElementById("forgotPassword-modal")
const forgotCancel = document.getElementById("forgotCancel");

forgotPassword.addEventListener('click', () => {
    passwordModal.style.display = "block";
})

forgotCancel.addEventListener('click', () => {
    passwordModal.style.display = "none";
})

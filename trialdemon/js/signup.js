
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

const signup = document.getElementById("submit")
var response
signup.addEventListener('click', () => {
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
            const statusDiv = document.getElementById("error");
            statusDiv.innerHTML = data;
            statusDiv.style.display = "block";
            hideLoader();
        } else {
            hideLoader();
            location.href="./dashboard";
        }
    })
})





const submit = document.getElementById("submit");
const loadSpinner = document.getElementById("loadSpinner");
const lockIcon = document.getElementById("lockIcon");

function displayLoader() {
    lockIcon.style.display = "none"
    loadSpinner.style.display = "block"
}

function hideLoader() {
    loadSpinner.style.display = "none"
    lockIcon.style.display = "block"
}


var response
submit.addEventListener('click', () => {
    const formData = new FormData(document.getElementById("tempPassForm"));

    fetch('https://www.trialdemon.com/api/model.php', {
        method: 'POST',
        body: formData
    }).then(displayLoader())
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            hideLoader()
            
            const statusDiv = document.getElementById("error");
            statusDiv.innerHTML = data;
            statusDiv.style.display = "block";
         
        } else {
            hideLoader()
            location.href="./adminauthpanel";
        }
    })
})

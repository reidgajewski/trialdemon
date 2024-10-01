
const apiButton = document.getElementById("callApi");

apiButton.addEventListener('click', () => {
    alert("yeee")
})



/*

apiButton.addEventListener('click', () => {
    fetch('https://www.trialdemon.com/api/model.php?action=ratelimit', {
        method: 'GET',
    })
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        if(response != 200) {
            displayError(data);
            hideSpinnerEmail();
           
        } else {
            alert("called")
        }
    })
})

*/
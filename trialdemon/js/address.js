window.addEventListener("load", function() {

fetch('https://batch.openaddresses.io/api/data', {
    method: 'GET',
    withCredentials: true,
    credentials: 'include',
    headers: {
        'Authorization': 'Bearer oa.384ab32237698f917e8c59d7bfa0f776390eeef9da88f6b5e6b8fefaef44de0b',
        'Content-Type': 'application/json'
    }
    .then(res => {
        response = res.status
        return res.text()
    })
    .then(data => {
        console.log(data);
    })
});

});

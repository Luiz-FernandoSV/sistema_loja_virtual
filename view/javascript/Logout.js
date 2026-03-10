const logoutBtn = document.getElementById('btnSair');

logoutBtn.addEventListener('click', () => {
    fetch('../controller/Logout.php')
        .then(res => res.json())
        .then(Response => {
            if (Response.status == "200") {
                window.location.href = "./index.html";
            }
        })
})
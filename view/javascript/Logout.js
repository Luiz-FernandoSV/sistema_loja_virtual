const logoutBtn = document.querySelector('.logoutBtn');

logoutBtn.addEventListener('click', () => {
    fetch('../controller/Logout.php')
        .then(res => res.json())
        .then(Response => {
            if (Response.status == "200") {
                window.location.href = "./index.html";
            }
        })
})
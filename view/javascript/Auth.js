const form = document.querySelector('form');
form.addEventListener("submit", (event) => {
    const dados = new FormData(form);

    let emailForm = dados.get("email");
    let senhaForm = dados.get("senha");
    console.log(emailForm, senhaForm);

    event.preventDefault();
    fetch("../controller/ControllerAuth.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: emailForm,
            senha: senhaForm
        })
    })
        .then(res => res.json())
        .then(response => {
            if (response.status == "200") {
                // Redirecionamento para a página de dashboard
                window.location.href = "./dashboard.php";
            } else {
                alert(response.msg);
                // Exibir mensagens de erro no form
            }
        })
})
const form = document.querySelector('form');
const msgErro = document.querySelector('.msgErro');
console.log(msgErro);

form.addEventListener("submit", (event) => {

    event.preventDefault();

    const dados = new FormData(form);

    let emailForm = dados.get("email");
    let senhaForm = dados.get("senha");

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
            if(response.status == "404" || response.status == "401" || response.status == "400"){
                // Exibe a mensagem de erro no form
                msgErro.classList.remove('d-none')
            }
            if (response.status == "200") {
                // login correto, redireciona pra pagina de usuário
                window.location.href = "./dashboard.php";
            }

        })
        .catch(error => {
            console.log(error);
        });

});
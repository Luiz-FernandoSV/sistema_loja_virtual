const formCadastro = document.querySelector('form');
const msgErro = document.querySelector('.msgErro');

formCadastro.addEventListener('submit', (event) => {
    event.preventDefault();

    const dados = new FormData(formCadastro);
    let nomeForm = dados.get('nome');
    let emailForm = dados.get('email');
    let senhaForm = dados.get('senha');

    if (nomeForm.length == 0 || emailForm.length == 0 || senhaForm.length == 0) {
        msgErro.classList.remove('d-none');
        return;
    }

    fetch('../controller/ControllerUser.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nome: nomeForm,
            email: emailForm,
            senha: senhaForm
        })
    }).then(res => res.json())
        .then(response => {

            if (response.status == "201") {
                window.location.href = "./login.php";
            } else {
                msgErro.classList.remove('d-none');
            }
        })
})
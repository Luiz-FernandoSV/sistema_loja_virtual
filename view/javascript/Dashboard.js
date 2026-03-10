const btnEditar = document.querySelector('#editar');
const formAlterar = document.querySelector("#formAlterar");
const btnSalvar = document.querySelector('#salvar');

let inputs = document.querySelectorAll('.input-dashboard');

btnEditar.addEventListener('click', () => {
    inputs.forEach(input => {
        input.classList.toggle('ativo');

        if (input.hasAttribute('disabled')) {
            input.removeAttribute('disabled');
        } else {
            input.setAttribute('disabled', true);
        }
    });
    if (btnSalvar.hasAttribute('hidden')) {
        btnSalvar.removeAttribute('hidden');
    } else {
        btnSalvar.setAttribute('hidden', true);
    }


})

formAlterar.addEventListener('submit', (event) => {
    event.preventDefault();
    btnSalvar.setAttribute('hidden', true);
    const dados = new FormData(formAlterar);

    let nomeForm = dados.get('nome');
    let emailForm = dados.get('email');

    fetch("../controller/ControllerUser.php", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nome: nomeForm,
            email: emailForm,
        })
    })
        .then(res => res.json())
        .then(response => {
            if (!response.status == "200") {
                console.log("erro na requisição!")
            }
        })
})
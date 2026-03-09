const formCadastro = document.querySelector('form');

formCadastro.addEventListener('submit',(event) => {
    event.preventDefault();

    const dados = new FormData(formCadastro);
    let nomeForm = dados.get('nome');
    let emailForm = dados.get('email');
    let senhaForm = dados.get('senha');

    fetch('../controller/ControllerCadastro.php',{
        method: "POST",
        headers: {
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            nome: nomeForm,
            email: emailForm,
            senha: senhaForm
        })
    }).then(res => res.json())
    .then(response => {
        if(response.status == "201"){
            alert("Criado com sucesso!");
            window.location.href = "./login.html";
        }else{
            // Exibir mensagens de erro no form
        }
    })
})
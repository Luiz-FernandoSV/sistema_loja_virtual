const formCadastroProdutos = document.querySelector('form');

formCadastroProdutos.addEventListener('submit',(event) => {
    event.preventDefault();

    const dados = new FormData(formCadastroProdutos);
    let nomeForm = dados.get('nome');
    let imagemForm = dados.get('imagem');
    let descricaoForm = dados.get('descricao');
    let quantidadeForm = dados.get('quantidade');
    let precoForm = dados.get('preco');

    fetch('../controller/ControllerProdutos.php',{
        method: "POST",
        headers: {
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            nome: nomeForm,
            imagem: imagemForm,
            descricao: descricaoForm,
            quantidade: quantidadeForm,
            preco: precoForm

        })
    }).then(res => res.json())
    .then(response => {
        if(response.status == "201"){
            alert("Criado com sucesso!");
        }else{
            // Exibir mensagens de erro no form
        }
    })
})
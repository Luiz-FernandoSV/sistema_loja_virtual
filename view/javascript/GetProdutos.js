window.addEventListener('DOMContentLoaded', () => {
    const tabelaProdutos = document.getElementById("corpoTabela");

    fetch("../controller/ControllerProdutos.php")
        .then(res => res.json())
        .then(response => {
            console.log(response);
            console.log(tabelaProdutos);
            let produtos = response;

            tabelaProdutos.innerHTML = "";

            produtos.forEach(produto => {

                let nomeForm = produto.nome;
                let imagemForm = produto.imagem;
                let descricaoForm = produto.descricao;
                let quantidadeForm = produto.quantidade;
                let precoForm = produto.preco;

                let linha = `
            <tr>
                <td>${nomeForm}</td>
                <td><img src="${imagemForm}" width="60"></td>
                <td>${descricaoForm}</td>
                <td>${quantidadeForm}</td>
                <td>R$ ${precoForm}</td>
            </tr>
        `;

                produtos = response;

                tabelaProdutos.innerHTML += linha;
            });
        })
})
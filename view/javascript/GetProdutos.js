window.addEventListener('DOMContentLoaded', () => {    
    // Verifica se ja não há produtos no localstorage
    const produtosLocal = JSON.parse(localStorage.getItem("produtos"));
    
    // caso seja a primeira requisição (localstorage vazio)
    if(produtosLocal == null){
        fetch("./javascript/Produtos.JSON")
        .then(res => res.json())
        .then(response => {
            let produtosBD = response;
            // salva os produtos no localstorage
            localStorage.setItem("produtos", JSON.stringify(produtosBD))
            console.log("requisicao")
            // renderiza os produtos na tela
            renderizarProdutos(produtosBD)
        })
    }
    else{
        // usa os produtos do localstorage e renderiza na tela
        renderizarProdutos(produtosLocal);
        console.log("localstorage");
    }
})

function renderizarProdutos(produtos){
    const listaProdutos = document.getElementById("listaProdutos");
    listaProdutos.innerHTML = "";

    // para cada produto no JSON monta um card
    produtos.forEach(produto => {
        const cardProduto = `
       <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-index="${produto.id}">
            <div class="card h-100">
                <img src="${produto.imagem}" class="card-img-top produto-img" alt="Imagem do produto">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="card-title mb-0">${produto.nome}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">${produto.descricao}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-success">
                        <strong>
                            R$ ${produto.preco}
                        </strong>
                    </span>
                    <button class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>
        `
        listaProdutos.innerHTML += cardProduto;
    })
}
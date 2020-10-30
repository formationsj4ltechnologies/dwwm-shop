$(document).ready(function () {
    $('#navbarDropdown').mouseenter(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/panier/",
            method: "GET"
        }).done((articles) => {
            // console.log(articles.panier);
            const contenuPanier = articles.panier;
            // console.log(panier);

            const imagePath = "/images/produits/";

            $(".contenu-panier").empty();

            contenuPanier.forEach(function (article) {
                $(".contenu-panier").append(
                    `<tr id="ligne-${article.produit.id}">
                        <td class="article-produit-image">
                            <img src="${imagePath}/${article.produit.imageName}" alt="${article.produit.nom}" class="img-fluid">
                        </td>
                        <td class="article-produit-nom-prix">
                            <span class="text-lg-center text-uppercase"><b>${article.produit.nom}</b></span>                            
                            <br>
                            <span class="prix">${article.produit.prix} €</span>                            
                        </td>
                        <td class="article-produit-quantite">
                            <i id="augmenter-${article.produit.id}" onclick="augmenter(${article.produit.id})" class="fas fa-arrow-circle-up augmenter"></i>
                            <span id="quantite-${article.produit.id}">${article.quantite}</span>
                            <i id="diminuer-${article.produit.id}" onclick="diminuer(${article.produit.id})" class="fas fa-arrow-circle-down diminuer"></i>
                        </td>    
                        <td class="article-produit-supprimer">
                            <i class="fas fa-trash"></i>
                        </td>                    
                    </tr>                                             
                    `
                );
            })
        })
    }).click(function () {
        $('.contenu-panier').toggle();
    });
});

function augmenter(id) {
    $.ajax({
        url: `/panier/augmenter/${id}`,
        method: 'GET'
    }).done(function (data) {
        $(`#quantite-${id}`).text(data.quantite);
    })
}

function diminuer(id) {
    $.ajax({
        url: `/panier/diminuer/${id}`,
        method: 'GET'
    }).done(function (data) {
        $(`#quantite-${id}`).text(data.quantite);
    })
}


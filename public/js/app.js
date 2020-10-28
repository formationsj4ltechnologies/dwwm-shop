$(document).ready(function (e) {
    $('#navbarDropdown').mouseover(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/panier/",
            method: "GET"
        }).done((articles) => {
            //console.log(articles.panier);
            const imagePath = "/images/produits"
            $('.contenu-panier').empty();
            articles.panier.forEach(function (article) {
                // console.log(article.produit.imageName);
                $('.contenu-panier').append(
                    `<tr id="ligne-${article.produit.id}">
                        <td class="article-produit-image">
                            <img src="${imagePath}/${article.produit.imageName}" alt="" class="img-fluid">
                        </td>
                        <td class="article-produit-nom-prix">
                            <span class="text-lg-center text-uppercase"><b>${article.produit.nom}</b></span>                            
                            <br>
                            <span class="prix">${article.produit.prix} €</span>                            
                        </td>
                        <td class="article-produit-quantite">
                            <i id="${article.produit.id}" class="fas fa-arrow-circle-up augmenter" data-id="${article.produit.id}" data-slug="${article.produit.slug}" onclick="augmenter(${article.produit.id})"></i>
                            <span id="quantite">${article.quantite}</span>
                            <i id="${article.produit.id}" class="fas fa-arrow-circle-down diminuer" data-id="${article.produit.id}" data-slug="${article.produit.slug}" onclick="diminuer(${article.produit.id})"></i>
                        </td>    
                        <td class="article-produit-supprimer">
                            <i class="fas fa-trash"></i>
                        </td>                    
                    </tr>                                             
                    `
                )
            });
        });
    }).click(function () {
        $('.contenu-panier').toggle();
    });
});

function augmenter(produitId) {
    let id = $(`#${produitId}`).data('id');
    $.ajax({
        url: `/panier/augmenter/${id}`,
        method: 'GET'
    }).done(function (data) {
        $("#quantite").text(data.quantite);
    });
}

function diminuer(produitId) {
    let id = $(`#${produitId}`).data('id');
    $.ajax({
        url: `/panier/diminuer/${id}`,
        method: 'GET'
    }).done(function (data) {
        let qte = data.quantite;
        if (qte > 0) {
            $("#quantite").text(data.quantite);
        } else {
            $(`#ligne-${id}`).fadeOut(1000);
        }
    });
}
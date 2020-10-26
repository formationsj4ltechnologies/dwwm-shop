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
                    `<tr>
                        <td class="article-produit-image">
                            <img src="${imagePath}/${article.produit.imageName}" alt="" class="img-fluid">
                        </td>
                        <td class="article-produit-nom-prix">
                            <span class="text-lg-center text-uppercase"><b>${article.produit.nom}</b></span>                            
                            <br>
                            <span class="prix">${article.produit.prix} €</span>                            
                        </td>
                        <td class="article-produit-quantite">
                            <i class="fas fa-arrow-circle-up augmenter"></i>
                            ${article.quantite}
                            <i class="fas fa-arrow-circle-down diminuer"></i>
                        </td>    
                        <td class="article-produit-supprimer">
                            <i class="fas fa-trash"></i>
                        </td>                    
                    </tr>                                             
                    `
                )
            })
        });
    }).click(function () {
        $('.contenu-panier').toggle();
    });

    $('.article-produit-supprimer').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/panier/supprimer",
            method: "GET"
        }).done((articles) => {
            //console.log(articles.panier);
            const imagePath = "/images/produits"
            $('.contenu-panier').empty();
            articles.panier.forEach(function (article) {
                // console.log(article.produit.imageName);
                $('.contenu-panier').append(
                    `<tr>
                        <td class="article-produit-image">
                            <img src="${imagePath}/${article.produit.imageName}" alt="" class="img-fluid">
                        </td>
                        <td class="article-produit-nom-prix">
                            <span class="text-lg-center text-uppercase"><b>${article.produit.nom}</b></span>                            
                            <br>
                            <span class="prix">${article.produit.prix} €</span>                            
                        </td>
                        <td class="article-produit-quantite">
                            <i class="fas fa-arrow-circle-up augmenter"></i>
                            ${article.quantite}
                            <i class="fas fa-arrow-circle-down diminuer"></i>
                        </td>    
                        <td class="article-produit-supprimer">
                            <i class="fas fa-trash"></i>
                        </td>                    
                    </tr>                                             
                    `
                )
            })
        });
    })
});
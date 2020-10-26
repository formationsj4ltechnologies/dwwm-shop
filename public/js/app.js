$(document).ready(function (e) {
    $('#navbarDropdown').mouseenter(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/panier/",
            method: "GET"
        }).done(function (produits) {
            // alert(produits.panier);
            const imagePath = "images/produits"
            $('.contenu-panier').empty();
            produits.forEach(function (article) {
                console.log(article);
                // $('.contenu-panier').append(
                //     `<img src="${imagePath}/${article.produit.imageName}" alt="">`
                // )
            })
        });
    })
});
create table produit
(
    id           int auto_increment
        primary key,
    marque_id    int          not null,
    categorie_id int          not null,
    nom          varchar(50)  not null,
    prix         double       not null,
    dispo        tinyint(1)   not null,
    description  longtext     not null,
    webcam       tinyint(1)   not null,
    cpu          varchar(255) not null,
    ram          varchar(255) not null,
    vga          varchar(255) not null,
    taille       varchar(255) not null,
    disque_dur   varchar(255) not null,
    image_name   varchar(255) not null,
    slug         varchar(255) null,
    created_at   datetime     not null,
    updated_at   datetime     null,
    constraint FK_29A5EC274827B9B2
        foreign key (marque_id) references marque (id),
    constraint FK_29A5EC27BCF5E72D
        foreign key (categorie_id) references categorie (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_29A5EC274827B9B2
    on produit (marque_id);

create index IDX_29A5EC27BCF5E72D
    on produit (categorie_id);

INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga, taille, disque_dur, image_name, slug, created_at, updated_at) VALUES (1, 1, 1, 'Xps 15', 149900, 1, '<div>De nos jours, le marché est inondé par une tonne d''ordinateurs portables qui se vendent comme des machines passe-partout voulant contenter tout le monde, des créatifs aux joueurs, en passant par les entrepreneurs. Une promesse non tenue par la majeure partie des modèles proposés. ́Cependant, avec le nouveau Dell XPS 15, nous tenons enfin un ordinateur portable qui sera facile à recommander ̀pour tout le monde.<br><br></div><div>Chaque élément de cet ordinateur portable dessine parfaitement ce que devrait être un ordinateur portable en 2020 : un magnifique écran, un clavier extrêmement confortable, des haut-parleurs avec un son très riche et un trackpad des plus ergonomiques. À partir de 1 699 € avec un processeur Intel Core i5 Comet Lake de 10e génération, 8 Go de RAM et un SSD de 512 Go, il se présente comme une alternative bien plus abordable que le MacBook Pro 16 pouces, qui commence à 2 699 €.<br><br></div>', 1, 'Intel Core i5 - i7 de 10e génération', '8 Go - 64 Go', 'Intel Iris Plus - Nvidia GeForce GTX 1650 Ti', '15.6"', 'SSD 256 Go - 1 To', 'Dell_XPS_15_1.jpg', 'xps-15', '2020-10-19 13:30:00', '2020-10-19 13:30:00');
INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga, taille, disque_dur, image_name, slug, created_at, updated_at) VALUES (2, 2, 1, 'Spectre X360', 206794, 1, '<div>L’an dernier, nous avions décerné le titre de meilleur ordinateur 2-en-1 au HP Spectre x360, pour son union réussie de l’élégance et de la puissance. Aujourd’hui, après une mise à niveau exceptionnelle, le Spectre x360 2020 devient notre meilleur PC portable toutes catégories confondues. Son tout nouveau processeur, le Core i7-1065G7 d’Intel, lui procure une puissance absolue tandis que sa carte graphique Iris Plus le laisse désormais flirter avec les jeux AAA sans rougir de ses performances ni de sa résolution. Ajoutez à cela une mémoire RAM doublée, un disque dur de 1 To intégrant la technologie Intel Optane plus un superbe écran tactile 4K - désormais disponible pour les configurations bas de gamme -, et vous obtenez un ordinateur portable non seulement magnifique, mais qui s’avère aussi un véritable plaisir à l’usage.<br><br></div><div>Bien sûr, une telle configuration embarquée dans un châssis aussi fin supporte également quelques inconvénients. Comme une tendance à chauffer très vite, particulièrement si vous vous lancez dans des tâches exigeantes telles que du montage vidéo en 4K ou la production d’un rendu 3D. Le prix peut de même être bloquant, comptez 1499 € pour le modèle conseillé incluant 8 Go de RAM et 512 Go de stockage. Ce qui n’est pas plus cher que nombre de 2-en-1 actuellement sur le marché, tout en bénéficiant ici d’une conception et de performances supérieures.</div>', 1, 'Intel Core i5 - i7 de 10e génération', '8 Go - 16 Go', 'Intel Iris Plus', '13,3"', 'SSD 256 Go - 2 To', 'HP_Spectre_x360_1.jpg', 'spectre-x360', '2020-10-19 13:43:15', '2020-10-19 13:43:15');
INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga, taille, disque_dur, image_name, slug, created_at, updated_at) VALUES (3, 1, 1, 'Xps 13', 113999, 1, '<div>Le Dell XPS 13 trône depuis des années en tant que meilleur ordinateur portable toutes catégories confondues. Si le Spectre x360 lui a ravi sa place aujourd’hui (voir pourquoi un peu plus haut), l’édition 2020 du XPS 13 reste résolument bien classée. Elle conserve ce qui fait le prestige du fleuron de Dell : une conception magnifique et légère, alliée à de puissants composants réactualisés. Le Dell XPS 13 est équipé de processeurs Intel Core i5 ou i7 de la 10e génération et d''un écran Infinity Edge offrant un affichage des plus lumineux et colorés.<br><br></div><div>De plus, il existe un large éventail d''options de personnalisation, ce qui vous permet de faire du Dell XPS 13 le portable qui répond le mieux à vos besoins. Mieux encore : le modèle 2020 se veut aussi autonome que puissant, et peut vous accompagner sans recharge pendant presque 10 heures. D’autant que la batterie s’adapte en permanence à vos usages, professionnels comme divertissants. La qualité sonore est cependant à revoir - les haut-parleurs se retrouvant sous l’appareil. Sa fourchette de prix, se rapprochant dangereusement de celle des MacBook Apple, aussi. Il n’en demeure pas moins un compétiteur et un compagnon portable idéal.</div>', 1, 'Intel Core i5 - i7 de 10e génération', '8 Go - 16 Go', 'Intel Iris Plus', '13,3"', 'SSD 256 G0 - 2 To', 'Dell_XPS_13_1.jpg', 'xps-13', '2020-10-19 13:53:24', '2020-10-19 13:53:24');
create table adresse
(
    id         int auto_increment
        primary key,
    numero     varchar(255) not null,
    voie       varchar(255) not null,
    code_poste varchar(255) not null,
    ville      varchar(255) not null
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table categorie
(
    id          int auto_increment
        primary key,
    nom         varchar(50)  not null,
    description longtext     null,
    slug        varchar(255) null,
    created_at  datetime     not null,
    updated_at  datetime     null
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table doctrine_migration_versions
(
    version        varchar(191) not null
        primary key,
    executed_at    datetime     null,
    execution_time int          null
)
    engine = InnoDB
    collate = utf8_unicode_ci;

create table marque
(
    id         int auto_increment
        primary key,
    nom        varchar(50)  not null,
    slug       varchar(255) null,
    created_at datetime     not null,
    updated_at datetime     null,
    constraint UNIQ_5A6F91CE6C6E55B5
        unique (nom)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

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

create table piece_jointe
(
    id         int auto_increment
        primary key,
    produit_id int          null,
    image_name varchar(255) not null,
    updated_at datetime     not null,
    created_at datetime     not null,
    slug       varchar(255) null,
    constraint FK_AB5111D4F347EFB
        foreign key (produit_id) references produit (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_AB5111D4F347EFB
    on piece_jointe (produit_id);

create index IDX_29A5EC274827B9B2
    on produit (marque_id);

create index IDX_29A5EC27BCF5E72D
    on produit (categorie_id);

create table user
(
    id          int auto_increment
        primary key,
    email       varchar(180) not null,
    roles       longtext     not null comment '(DC2Type:json)',
    prenom      varchar(50)  not null,
    password    varchar(255) not null,
    nom         varchar(255) not null,
    nom_complet varchar(255) not null,
    created_at  datetime     not null,
    updated_at  datetime     null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table commande
(
    id            int auto_increment
        primary key,
    client_id     int          not null,
    adresse_id    int          not null,
    numero        varchar(255) not null,
    total         double       not null,
    date_commande date         not null,
    create_at     datetime     not null,
    update_at     datetime     null,
    constraint FK_6EEAA67D19EB6921
        foreign key (client_id) references user (id),
    constraint FK_6EEAA67D4DE7DC5C
        foreign key (adresse_id) references adresse (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_6EEAA67D19EB6921
    on commande (client_id);

create index IDX_6EEAA67D4DE7DC5C
    on commande (adresse_id);

create table commentaire
(
    id         int auto_increment
        primary key,
    client_id  int      not null,
    produit_id int      not null,
    contenu    longtext not null,
    note       smallint not null,
    constraint FK_67F068BC19EB6921
        foreign key (client_id) references user (id),
    constraint FK_67F068BCF347EFB
        foreign key (produit_id) references produit (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_67F068BC19EB6921
    on commentaire (client_id);

create index IDX_67F068BCF347EFB
    on commentaire (produit_id);

create table ligne_commande
(
    id            int auto_increment
        primary key,
    commande_id   int      not null,
    produit_id    int      not null,
    quantite      smallint not null,
    prix_unitaire double   not null,
    constraint FK_3170B74B82EA2E54
        foreign key (commande_id) references commande (id),
    constraint FK_3170B74BF347EFB
        foreign key (produit_id) references produit (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_3170B74B82EA2E54
    on ligne_commande (commande_id);

create index IDX_3170B74BF347EFB
    on ligne_commande (produit_id);

# CATEGORIE
INSERT INTO db_dwwmshop.categorie (id, nom, description, slug, created_at, updated_at)
VALUES (1, 'Laptops', null, 'laptops', '2020-10-12 18:19:38', null);

# MARQUE
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at)
VALUES (1, 'Google', 'google', '2020-10-12 18:19:23', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at)
VALUES (2, 'Lenovo', 'lenovo', '2020-10-12 18:33:37', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at)
VALUES (3, 'Hp', 'hp', '2020-10-12 18:47:42', null);

# PRODUITS
INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga,
                                 taille, disque_dur, image_name, slug, created_at, updated_at)
VALUES (1, 1, 1, 'Pixelbook Go', 109900, 1,
        '<div>Google fabrique les meilleurs Chromebooks du monde. Le prédecesseur du Pixelbook Go occupait déjà la première classe de ce classement, son héritier le remplace dignement, tout en prouvant que ce type de produit égale l’élégance et la puissance de PC portables beaucoup mieux mis en avant. Le Pixelbook Go apporte des fonctionnalités premium supplémentaires par rapport au Pixelbook original : un clavier totalement silencieux avec une belle sensation de frappe, une webcam Full HD qui enregistre des vidéos à 60 images par seconde, une autonomie exceptionnelle dépassant 11 heures sur une charge unique. La version Core i7 et 16 Go de RAM permet même de s’attaquer à l’édition photo, une tâche dispensable sur les Chromebooks.</div>',
        1, 'Intel Core i7', '8 Go - 16 Go', 'Intel UHD', '13,3"', '256 Go', 'Google_Pixelbook_Go_01.jpg',
        'pixelbook-go', '2020-10-12 18:26:37', '2020-10-12 18:28:11');
INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga,
                                 taille, disque_dur, image_name, slug, created_at, updated_at)
VALUES (2, 2, 1, 'Ideapad Duet', 47300, 1,
        '<div>Est-ce un Chromebook ou une tablette ? Heureusement, vous n''aurez pas à vous décider. Fidèle à sa dénomination, ce Chromebook offre deux facteurs de forme en un. Tout en utilisant la polyvalence du système d''exploitation Chrome et en vous permettant d''obtenir un résultat bien inférieur à celui de la plupart des tablettes Windows les plus répandues.<br><br></div><div>Bien sûr, fidèle à sa nature de Chromebook, sa batterie a une durée de vie incroyablement longue de près de 22 heures - vous pourriez passer une nuit blanche dessus, l’utiliser encore toute la journée qui suit et tomber de sommeil, avant qu''il ne soit à court de jus. Pour ce prix, des sacrifices doivent être faits, naturellement : ainsi, le clavier est minuscule, le trackpad n''est pas des plus fiables, tandis que le chargeur et les écouteurs partagent un seul et même port. Cependant, si vous ne souhaitez pas vous ruiner pour un nouveau PC, cette alternative se place en tête de vos meilleures options.<br><br></div><div>Le Duet fait exactement ce pourquoi il est conçu : navigation web, streaming vidéo et utilisation d’applications bureautiques s’exécutent sans aucune faiblesse. Il parvient même à offrir des performances très respectables en ce qui concerne les jeux mobiles légers, voire modérés. Ce n''est en aucun cas un PC portable gamer, mais si vous pouvez jouer un titre sur votre smartphone ou votre tablette dédiée, vous pouvez l’exécuter aussi bien sur le Duet.<br><br></div>',
        1, 'MediaTek', '4 Go', 'ARM G72', '10.1"', '64 Go', 'Lenovo_Ideapad_Duet_01.jpg', 'ideapad-duet',
        '2020-10-12 18:43:39', '2020-10-12 18:43:39');
INSERT INTO db_dwwmshop.produit (id, marque_id, categorie_id, nom, prix, dispo, description, webcam, cpu, ram, vga,
                                 taille, disque_dur, image_name, slug, created_at, updated_at)
VALUES (3, 3, 1, 'Chromebook 14', 27900, 1,
        '<div>Vous êtes hermétique au format Chromebook ? Le HP Chromebook 14 pourrait définitivement vous convertir. Agréablement compact, avec un revêtement bleu brillant et un écran lumineux qui vous coupera le souffle, ce petit modèle de HP ne s’impose pas uniquement grâce à son physique. Son clavier ainsi que son pavé tactile haut de gamme livre une expérience de frappe fluide et sans égale. Sa configuration en fait un portable rapide et réactif, tandis que le nombre de ports disponibles vous permettra de combiner de nombreux périphériques USB, ce pour un prix plus qu’abordable. Nous pourrions lui reprocher une batterie tout juste passable (comptez 5h entre chaque recharge), mais ce serait chercher la petite bête.</div>',
        1, 'Intel Celeron', '4 Go', 'Intel HD', '14"', '64 Go', 'hp-chromebook-ram-01.jpg', 'chromebook-14',
        '2020-10-12 18:53:17', '2020-10-12 18:53:17');


# PIESEJOINTES
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (1, 2, 'Lenovo_Ideapad_Duet_02.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-02-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (2, 2, 'Lenovo_Ideapad_Duet_03.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-03-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (3, 2, 'Lenovo_Ideapad_Duet_04.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-04-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (4, 2, 'Lenovo_Ideapad_Duet_05.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-05-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (5, 2, 'Lenovo_Ideapad_Duet_06.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-06-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (6, 2, 'Lenovo_Ideapad_Duet_07.jpg', '2020-10-12 18:43:39', '2020-10-12 18:43:39', 'lenovo-ideapad-duet-07-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (7, 3, 'hp-chromebook-ram-02.jpg', '2020-10-12 18:53:17', '2020-10-12 18:53:17', 'hp-chromebook-ram-02-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (8, 3, 'hp-chromebook-ram-03.jpg', '2020-10-12 18:53:17', '2020-10-12 18:53:17', 'hp-chromebook-ram-03-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug)
VALUES (9, 3, 'hp-chromebook-ram-04.jpg', '2020-10-12 18:53:17', '2020-10-12 18:53:17', 'hp-chromebook-ram-04-jpg');



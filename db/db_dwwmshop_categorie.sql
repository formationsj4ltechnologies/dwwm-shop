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

INSERT INTO db_dwwmshop.categorie (id, nom, description, slug, created_at, updated_at) VALUES (1, 'Laptops', '<div>Bienvenue dans notre sélection des meilleurs ordinateurs portables de 2020. Dans ce guide, vous trouverez le meilleur ordinateur portable correspondant à vos besoins, qu’il s’agisse d’un Ultrabook, d’un Chromebook, d’un MacBook, d’un PC Gamer ou d’un 2-en-1</div>', 'laptops', '2020-10-19 13:17:08', '2020-10-19 13:18:33');
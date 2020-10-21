create table if not exists adresse
(
    id int auto_increment
        primary key,
    numero varchar(255) not null,
    voie varchar(255) not null,
    code_poste varchar(255) not null,
    ville varchar(255) not null
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create table if not exists categorie
(
    id int auto_increment
        primary key,
    nom varchar(50) not null,
    description longtext null,
    slug varchar(255) null,
    created_at datetime not null,
    updated_at datetime null
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create table if not exists doctrine_migration_versions
(
    version varchar(191) not null
        primary key,
    executed_at datetime null,
    execution_time int null
)
    engine=InnoDB collate=utf8_unicode_ci;

create table if not exists marque
(
    id int auto_increment
        primary key,
    nom varchar(50) not null,
    slug varchar(255) null,
    created_at datetime not null,
    updated_at datetime null,
    constraint UNIQ_5A6F91CE6C6E55B5
        unique (nom)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create table if not exists produit
(
    id int auto_increment
        primary key,
    marque_id int not null,
    categorie_id int not null,
    nom varchar(50) not null,
    prix double not null,
    dispo tinyint(1) not null,
    description longtext not null,
    webcam tinyint(1) not null,
    cpu varchar(255) not null,
    ram varchar(255) not null,
    vga varchar(255) not null,
    taille varchar(255) not null,
    disque_dur varchar(255) not null,
    image_name varchar(255) not null,
    slug varchar(255) null,
    created_at datetime not null,
    updated_at datetime null,
    constraint FK_29A5EC274827B9B2
        foreign key (marque_id) references marque (id),
    constraint FK_29A5EC27BCF5E72D
        foreign key (categorie_id) references categorie (id)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create table if not exists piece_jointe
(
    id int auto_increment
        primary key,
    produit_id int null,
    image_name varchar(255) not null,
    updated_at datetime not null,
    created_at datetime not null,
    slug varchar(255) null,
    constraint FK_AB5111D4F347EFB
        foreign key (produit_id) references produit (id)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create index IDX_AB5111D4F347EFB
    on piece_jointe (produit_id);

create index IDX_29A5EC274827B9B2
    on produit (marque_id);

create index IDX_29A5EC27BCF5E72D
    on produit (categorie_id);

create table if not exists user
(
    id int auto_increment
        primary key,
    email varchar(180) not null,
    roles longtext not null comment '(DC2Type:json)',
    prenom varchar(50) not null,
    password varchar(255) not null,
    nom varchar(255) not null,
    nom_complet varchar(255) not null,
    created_at datetime not null,
    updated_at datetime null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create table if not exists commande
(
    id int auto_increment
        primary key,
    client_id int not null,
    adresse_id int not null,
    numero varchar(255) not null,
    total double not null,
    date_commande date not null,
    create_at datetime not null,
    update_at datetime null,
    constraint FK_6EEAA67D19EB6921
        foreign key (client_id) references user (id),
    constraint FK_6EEAA67D4DE7DC5C
        foreign key (adresse_id) references adresse (id)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create index IDX_6EEAA67D19EB6921
    on commande (client_id);

create index IDX_6EEAA67D4DE7DC5C
    on commande (adresse_id);

create table if not exists commentaire
(
    id int auto_increment
        primary key,
    client_id int not null,
    produit_id int not null,
    contenu longtext not null,
    note smallint not null,
    constraint FK_67F068BC19EB6921
        foreign key (client_id) references user (id),
    constraint FK_67F068BCF347EFB
        foreign key (produit_id) references produit (id)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create index IDX_67F068BC19EB6921
    on commentaire (client_id);

create index IDX_67F068BCF347EFB
    on commentaire (produit_id);

create table if not exists ligne_commande
(
    id int auto_increment
        primary key,
    commande_id int not null,
    produit_id int not null,
    quantite smallint not null,
    prix_unitaire double not null,
    constraint FK_3170B74B82EA2E54
        foreign key (commande_id) references commande (id),
    constraint FK_3170B74BF347EFB
        foreign key (produit_id) references produit (id)
)
    engine=InnoDB collate=utf8mb4_unicode_ci;

create index IDX_3170B74B82EA2E54
    on ligne_commande (commande_id);

create index IDX_3170B74BF347EFB
    on ligne_commande (produit_id);


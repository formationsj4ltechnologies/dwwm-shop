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


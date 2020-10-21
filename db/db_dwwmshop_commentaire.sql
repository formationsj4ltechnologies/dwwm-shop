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


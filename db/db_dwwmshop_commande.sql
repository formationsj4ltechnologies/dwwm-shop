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


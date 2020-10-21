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


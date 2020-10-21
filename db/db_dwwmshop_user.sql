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

INSERT INTO db_dwwmshop.user (id, email, roles, prenom, password, nom, nom_complet, created_at, updated_at) VALUES (1, 'kim@email.fr', '["ROLE_ADMIN"]', 'Joachim', '$2y$13$q/qo5CcoaeMiN7kLPGuf2uWZ4ALf44HghK2o0D1EfBLxeBdt7io.G', 'ZADI', 'Joachim ZADI', '2020-10-19 13:11:35', null);
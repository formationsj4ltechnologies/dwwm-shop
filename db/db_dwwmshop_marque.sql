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

INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (1, 'Dell', 'dell', '2020-10-19 13:19:30', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (2, 'Hp', 'hp', '2020-10-19 13:20:04', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (3, 'Lg', 'lg', '2020-10-19 13:20:29', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (4, 'Acer', 'acer', '2020-10-19 13:20:50', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (5, 'Apple', 'apple', '2020-10-19 13:21:09', '2020-10-19 13:21:29');
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (6, 'Asus', 'asus', '2020-10-19 13:21:54', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (7, 'Google', 'google', '2020-10-19 13:23:00', null);
INSERT INTO db_dwwmshop.marque (id, nom, slug, created_at, updated_at) VALUES (8, 'Microsoft', 'microsoft', '2020-10-19 13:23:33', null);
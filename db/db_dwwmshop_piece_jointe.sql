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

INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (1, 1, 'Dell_XPS_15_2.jpg', '2020-10-19 13:30:00', '2020-10-19 13:30:00', 'dell-xps-15-2-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (2, 1, 'Dell_XPS_15_3.jpg', '2020-10-19 13:35:11', '2020-10-19 13:35:11', 'dell-xps-15-3-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (3, 1, 'Dell_XPS_15_4.jpg', '2020-10-19 13:35:11', '2020-10-19 13:35:11', 'dell-xps-15-4-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (4, 1, 'Dell_XPS_15_5.jpg', '2020-10-19 13:35:11', '2020-10-19 13:35:11', 'dell-xps-15-5-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (5, 2, 'HP_Spectre_x360_2.jpg', '2020-10-19 13:43:15', '2020-10-19 13:43:15', 'hp-spectre-x360-2-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (6, 2, 'HP_Spectre_x360_3.jpg', '2020-10-19 13:43:15', '2020-10-19 13:43:15', 'hp-spectre-x360-3-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (7, 2, 'HP_Spectre_x360_4.jpg', '2020-10-19 13:43:15', '2020-10-19 13:43:15', 'hp-spectre-x360-4-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (8, 2, 'HP_Spectre_x360_5.jpg', '2020-10-19 13:43:15', '2020-10-19 13:43:15', 'hp-spectre-x360-5-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (9, 3, 'Dell_XPS_13_2.jpg', '2020-10-19 13:53:24', '2020-10-19 13:53:24', 'dell-xps-13-2-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (10, 3, 'Dell_XPS_13_3.jpg', '2020-10-19 13:53:24', '2020-10-19 13:53:24', 'dell-xps-13-3-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (11, 3, 'Dell_XPS_13_4.jpg', '2020-10-19 13:53:24', '2020-10-19 13:53:24', 'dell-xps-13-4-jpg');
INSERT INTO db_dwwmshop.piece_jointe (id, produit_id, image_name, updated_at, created_at, slug) VALUES (12, 3, 'Dell_XPS_13_5.jpg', '2020-10-19 13:53:24', '2020-10-19 13:53:24', 'dell-xps-13-5-jpg');
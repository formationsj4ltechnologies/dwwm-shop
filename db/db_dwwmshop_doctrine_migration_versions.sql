create table doctrine_migration_versions
(
    version        varchar(191) not null
        primary key,
    executed_at    datetime     null,
    execution_time int          null
)
    engine = InnoDB
    collate = utf8_unicode_ci;

INSERT INTO db_dwwmshop.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\\Version20201012154828', '2020-10-19 13:11:09', 10493);
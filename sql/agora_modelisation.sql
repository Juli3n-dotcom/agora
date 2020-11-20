DROP DATABASE IF EXISTS agora;
CREATE DATABASE agora
CHARACTER
SET utf8mb4
COLLATE utf8mb4_unicode_ci;
USE agora;

create TABLE Team
(
    id INT(3) NOT NULL
    AUTO_INCREMENT,
nom VARCHAR
    (20) NOT NULL,
prenom VARCHAR
    (20) NOT NULL,
email VARCHAR
    (50) NOT NULL,
password VARCHAR
    (60) NOT NULL,
statut INT
    (3) NOT NULL,
date_enregistrement DATE NOT NULL,
confirmation TINYINT DEFAULT NULL,
 token VARCHAR
    (255) DEFAULT NULL,
 PRIMARY KEY
    (id)
)ENGINE=INNODB;

    CREATE TABLE user
    (
        id_user INT(3) NOT NULL
        AUTO_INCREMENT,
 ip VARCHAR
        (255) NOT NULL,
 email VARCHAR
        (50) NOT NULL,
 password VARCHAR
        (60) NOT NULL,
 civilite BOOLEAN,
 nom VARCHAR
        (20) NOT NULL,
 prenom VARCHAR
        (20) NOT NULL,
 telephone VARCHAR
        (20) NOT NULL,
 date_birth DATETIME NOT NULL,
 age INT
        (3) NOT NULL,
 statut INT
        (3) NOT NULL,
 date_enregistrement DATE NOT NULL,
 confirmation TINYINT DEFAULT NULL,
 token VARCHAR
        (255) DEFAULT NULL,
 PRIMARY KEY
        (id_user)
)ENGINE=INNODB;

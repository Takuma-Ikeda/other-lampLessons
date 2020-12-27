CREATE DATABASE contact;
USE contact;

CREATE TABLE detail (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    furigana VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel CHAR(20) NOT NULL,
    sex_id INT NOT NULL,
    item_id INT NOT NULL,
    content TEXT NOT NULL,
    created DATETIME NOT NULL,
    updated DATETIME,
    PRIMARY KEY(id)
);

CREATE TABLE sex (
    id INT NOT NULL AUTO_INCREMENT,
    sex CHAR(10) NOT NULL UNIQUE,
    created DATETIME NOT NULL,
    updated DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES detail(sex_id)
);

CREATE TABLE item (
    id INT NOT NULL AUTO_INCREMENT,
    item VARCHAR(255) NOT NULL UNIQUE,
    created DATETIME NOT NULL,
    updated DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES detail(item_id)
);

CREATE DATABASE contact;
USE contact;

CREATE TABLE sex (
    id INT NOT NULL AUTO_INCREMENT,
    sex CHAR(10) NOT NULL UNIQUE,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE item (
    id INT NOT NULL AUTO_INCREMENT,
    item VARCHAR(255) NOT NULL UNIQUE,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE detail (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    furigana VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel CHAR(20) NOT NULL,
    sex_id INT NOT NULL,
    item_id INT NOT NULL,
    content TEXT NOT NULL,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(sex_id) REFERENCES sex(id),
    FOREIGN KEY(item_id) REFERENCES item(id)
);

INSERT INTO sex (sex) VALUES ('男性');
INSERT INTO sex (sex) VALUES ('女性');
INSERT INTO sex (sex) VALUES ('無回答');

INSERT INTO item (item) VALUES ('ご質問・お問い合わせ');
INSERT INTO item (item) VALUES ('ご意見・ご感想');

-- ダミーデータ
INSERT INTO detail (name, furigana, email, tel, sex_id, item_id, content) VALUES ('池田拓馬', 'いけだたくま', 'eeeeg.takuma.ikeda@gmail.com', '080-3178-3566', 1, 1, 'test');
INSERT INTO detail (name, furigana, email, tel, sex_id, item_id, content) VALUES ('池田拓馬', 'いけだたくま', 'eeeeg.takuma.ikeda@gmail.com', '080-3178-3566', 1, 1, 'test');
INSERT INTO detail (name, furigana, email, tel, sex_id, item_id, content) VALUES ('池田拓馬', 'いけだたくま', 'eeeeg.takuma.ikeda@gmail.com', '080-3178-3566', 1, 1, 'test');

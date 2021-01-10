create database contact;
use contact;
CREATE TABLE sex (
  id INT NOT NULL AUTO_INCREMENT,
  sex CHAR(10) NOT NULL UNIQUE,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);

-- INSERT INTO
--   sex (id,sex,created,updated)
-- VALUES
--   (1,'男性','2020-12-01 12:00:00','2020-12-01 12:00:00'),
--   (2,'女性','2020-12-01 12:00:00','2020-12-01 12:00:00'),
--   (3,'無回答','2020-12-01 12:00:00','2020-12-01 12:00:00');
INSERT INTO
  sex (sex)
VALUES
  ('男性'),
  ('女性'),
  ('無回答');

CREATE TABLE item (
  id INT NOT NULL AUTO_INCREMENT,
  item VARCHAR(255) NOT NULL UNIQUE,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);
INSERT INTO
  item (item)
VALUES
  ('ご質問・お問い合わせ'),
  ('ご意見・ご感想');

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
INSERT INTO
  detail (name,furigana,email,tel,sex_id,item_id,content)
VALUES
  ('池田拓馬','いけだたくま','eeeeg.takuma.ikeda@gmail.com','080-3178-3566',1,1,'はじめまして。求人募集していますか？	');


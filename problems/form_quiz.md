# FORM QUIZ

- 以下テンプレートファイルを利用して、お問い合わせページを作成します。
    - https://github.com/Takuma-Ikeda/other-lampLessons/tree/master/htdocs/answer/form_quiz

## 問題 1

「お問い合わせ」画面から「お問い合わせ 内容確認」画面に値を渡して、さらに「お問い合わせ 送信完了」画面に値を渡してください。

- 最初にリクエストされた値は UserRequest クラスで管理してください
    - プライベートなメンバ変数を定義してください
    - メンバ変数は Setter / Getter で利用してください
- メールアドレス、電話番号の形式チェックしてください
    - 形式がおかしい場合はエラーメッセージを表示してください
- すべて必須解答なので、未入力の場合はエラーメッセージを表示してください

## 問題 2

「お問い合わせ 送信完了」画面にて、お問い合わせ内容を DB 保存してください。

DB 名は `contact` にして、テーブル設計は以下を参照してください。また、SQL ファイルを作成するようにしてください。

### detail テーブル

|id|name|furigana|email|tel|sex_id|item_id|content|created|updated|
|:--|:--|:--|:--|:--|:--|:--|:--|:--|:--|
|1|池田拓馬|いけだたくま|eeeeg.takuma.ikeda@gmail.com|080-3178-3566|1|1|はじめまして。求人募集していますか？|2020-12-01 12:00:00||

- `id`
    - 主キー制約 (PRIMARY KEY)
    - AUTO_INCREMENT
    - INT
    - NOT NULL 制約
- `name`
    - VARCHAR(255)
    - NOT NULL 制約
- `furigana`
    - VARCHAR(255)
    - NOT NULL 制約
- `email`
    - VARCHAR(255)
    - NOT NULL 制約
- `tel`
    - CHAR(20)
    - NOT NULL 制約
- `sex_id`
    - INT
    - NOT NULL 制約
- `item_id`
    - item.id の外部キー制約 (FOREIGN KEY)
    - INT
    - NOT NULL 制約
- `content`
    - TEXT
    - NOT NULL 制約
- `created`
    - DATETIME
    - NOT NULL 制約
- `updated`
    - DATETIME

### sex テーブル

|id|sex|created|updated|
|:--|:--|:--|:--|
|1|男性|2020-12-01 12:00:00||
|2|女性|2020-12-01 12:00:00||
|3|無回答|2020-12-01 12:00:00||

- `id`
    - 主キー制約 (PRIMARY KEY)
    - AUTO_INCREMENT
    - INT
    - NOT NULL 制約
    - `detail.sex_id` の外部キー制約 (FOREIGN KEY)
- `sex`
    - CHAR(10)
    - NOT NULL 制約
    - 一意性制約 (UNIQUE KEY)
- `created`
    - DATETIME
    - NOT NULL 制約
- `updated`
    - DATETIME

### item テーブル

|id|item|created|updated|
|:--|:--|:--|:--|
|1|ご質問・お問い合わせ|2020-12-01 12:00:00||
|2|ご意見・ご感想|2020-12-01 12:00:00||

- `id`
    - 主キー制約 (PRIMARY KEY)
    - AUTO_INCREMENT
    - INT
    - NOT NULL 制約
    - `detail.item_id` の外部キー制約 (FOREIGN KEY)
- `item`
    - VARCHAR(255)
    - NOT NULL 制約
    - 一意性制約 (UNIQUE KEY)
- `created`
    - DATETIME
    - NOT NULL 制約
- `updated`
    - DATETIME

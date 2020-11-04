# TABLE QUIZ

## 問題 1 - HTML の復習

ある生徒のテストの点数を管理したいと思います。
HTML で以下のようなテーブルを作成してください

|id|名前|国語|算数|社会|理科|英語|プログラミング|
|:--|:--|:--|:--|:--|:--|:--|:--|
|1|池田|10|10|10|10|10|99|

## 問題 2 - 連想配列

`getStudent()` 関数を実行すると、以下の連想配列を受け取ることができるとします。

```php
[
    'id'          => 1,
    'name'        => '池田',
    'japanese'    => 0,
    'math'        => 0,
    'society'     => 0,
    'science'     => 0,
    'english'     => 0,
    'programming' => 100,
]
```

まず `getStudent()` を実装してください。
そして関数実行後に返ってくる連想配列を使って、テーブルに表示してください。

## 問題 3 - 多重連想配列

`getStudents()` 関数を実行すると、以下の多重連想配列を受け取ることができるとします。

```php
[
    ['id' => 1, 'name' => '池田', 'japanese' => 0, 'math' => 0, 'society' => 0, 'science' => 0, 'english' => 0, 'programming' => 100],
    ['id' => 2, 'name' => '斉藤', 'japanese' => 80, 'math' => 80, 'society' => 80, 'science' => 80, 'english' => 80, 'programming' => 80],
    ['id' => 3, 'name' => '大塚', 'japanese' => 100, 'math' => 70, 'society' => 90, 'science' => 70, 'english' => 60, 'programming' => 80],
    ['id' => 4, 'name' => '小林', 'japanese' => 70, 'math' => 60, 'society' => 80, 'science' => 100, 'english' => 60, 'programming' => 80],
]
```

まず `getStudents()` を実装してください。
そして関数実行後に返ってくる多重連想配列を使って、テーブルに表示してください。

※ ループ処理は使わないでください。

## 問題 4 - for 文

問題 3 の多重連想配列に対して for 文ループ処理をかけて各データを取り出して、テーブルに表示してください。

また `$students` のデータを増やしたり減らしたりしても、正しく表示されるか確認してみてください。

### おまけ

問題 4 のテーブルの偶数行、奇数行で背景色を変えてください。

## 問題 5 - foreach 文

問題 3 の多重連想配列に対して foreach 文ループ処理をかけて各データを取り出して、テーブルに表示してください。

また `$students` のデータを増やしたり減らしたりしても、正しく表示されるか確認してみてください。

### おまけ

問題 5 のテーブルの偶数行、奇数行で背景色を変えてください。

## 問題 6 - フィルタリング

関数 `getStudents()` が引数 `$ids` を受け取れるように変更して `getStudentsByIds($ids)` に変更してください。
引数 `$ids` は配列で、その要素は生徒の id とします。

関数を「受け取った id に合致する生徒のデータだけを返却する」ように修正して、テーブルもそのデータだけ表示してください。

もし存在しない id が渡されていたら、id 以外は ERROR という文字列でその行は表示してください。

## 問題 7 - 外部ファイルの読み込み

問題 6 の `.php` ファイルからビジネスロジックを排除してください。
名前空間は `util` にしてください。

※ 関数 `getStudentsByIds($ids)` の定義は他の `.php` ファイルに書く、ということです。

## 問題 8 - リクエスト / レスポンス

```html
<form class="student_id_form" action="table_quiz_08.php" method="post">
    <p>生徒の id を選択してください</p>
    <input type="checkbox" name="ids[]" value="1">1
    <input type="checkbox" name="ids[]" value="2">2
    <input type="checkbox" name="ids[]" value="3">3
    <input type="checkbox" name="ids[]" value="4">4
    <input type="submit" value="送信する">
</form>
```

上記チェックボックスを設置して、複数の id を POST 送信できるようにしてください。

※ 余裕があれば、生徒数から判断してチェックボックスの input タグを自動生成してみてください。
※ 余裕があれば、送信したチェックボックスのチェックは保持するようにしてみてください。


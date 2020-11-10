# VENDOR MACHINE QUIZ

これからオブジェクト指向プログラミングを意識して、いくつかの種類の自動販売機実装しようと思います。
商品情報については以下を参照してください。

|種類|商品名|価格|
|:--|:--|:--|
|ドリンク|A|120円|
|ドリンク|B|120円|
|ドリンク|C|120円|
|ドリンク|D|150円|
|ドリンク|E|150円|
|アイス|F|130円|
|アイス|G|130円|
|アイス|H|130円|
|アイス|I|160円|
|アイス|J|160円|
|タバコ|K|400円|
|タバコ|L|410円|
|タバコ|M|450円|
|タバコ|N|500円|
|タバコ|O|540円|
|新聞紙|P|150円|
|新聞紙|Q|150円|
|新聞紙|R|150円|
|新聞紙|S|150円|
|新聞紙|T|180円|

HTML のテンプレートファイルを用意しているので、[こちら](https://google.com)を流用してください。

基本的にブラウザで表示するときは `vendor_machine_quiz_template.php` をそのまま利用して、`require "./vendor_machine_quiz_*.php";` と `<form class="vendor-machine-form" action="vendor_machine_quiz_*.php" method="post">` だけ書き換えてください。

## 問題 1 - 投入した金額の表示、ボタンの活性化

### 前提条件

- drink-money
- ice-money
- tabacco-money
- news-paper-money

上記 input タグでは、自動販売機に投入するお金を「数値」で入力するようにします。

- pay-drink-money
- pay-ice-money
- pay-tabacco-money
- pay-news-paper-money

上記 input タグの押下によって、そのお金を自動販売機に投入するようにします。

### 問題 1.1

- drink-change
- ice-change
- tabacco-change
- news-paper-change

お金を投入したあと、上記 input タグにその金額を表示するようにしてください。

### 問題 1.2

- get-drink-change
- get-ice-change
- get-tabacco-change
- get-news-paper-change

お金を投入したあと、上記 input タグを活性化してください。

### 問題 1.3

- drink-buy
- ice-buy
- tabacco-buy
- news-paper-buy

お金を投入したあと、上記 button タグを活性化してください。

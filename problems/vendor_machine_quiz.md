# VENDOR MACHINE QUIZ

これからオブジェクト指向プログラミングを意識して、いくつかの種類の自動販売機実装しようと思います。
お金を入れるボタン、商品の購入ボタン、お釣りボタンは一度に一回しか押せない仕様とします。

商品情報については以下を参照してください。

|種類|商品名|価格|
|:--|:--|:--|
|ドリンク|A|140円|
|ドリンク|B|140円|
|ドリンク|C|140円|
|ドリンク|D|160円|
|ドリンク|E|160円|
|アイス|F|140円|
|アイス|G|140円|
|アイス|H|140円|
|アイス|I|170円|
|アイス|J|170円|
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

テンプレートファイルを用意しているので、[こちら](https://google.com)を流用してください。

## 問題 1 - 自動販売機クラスの作成

クラスだけを定義する `vendor_machine_quiz_class_01.php` ファイルを作成してください。

※ 以降の問題でも `vendor_machine_quiz_class_*.php` ファイルを作成していってください。

### 問題 1.1

抽象クラス VendorMachine を作成してください。
そして以下のプライベート変数を定義してください。

- `$item_name;`
- `$money;`
- `$change;`
- `$change_tag;`

以下の Setter / Getter メソッドも定義してください。

- `setItemName`
- `setMoney`
- `setChange`
- `setChangeTag`

- `getItemName`
- `getMoney`
- `getChange`
- `getChangeTag`

### 問題 1.2

抽象クラス VendorMachine を継承している以下のクラスを作成してください。

- DrinkVendorMachine
- IceVendorMachine
- TabaccoVendorMachine
- NewsPaperVendorMachine

それぞれのコンストラクタで以下 Setter メソッドを呼び出してください。

- DrinkVendorMachine
    - `parent::setChangeTag('<input class="change" type="text" name="drink_change" size="10" maxlength="5" placeholder="預り金" disabled>');`
- IceVendorMachine
    - `parent::setChangeTag('<input class="change" type="text" name="ice_change" size="10" maxlength="5" placeholder="預り金" disabled>');`
- TabaccoVendorMachine
    - `parent::setChangeTag('<input class="change" type="text" name="tabacco_change" size="10" maxlength="5" placeholder="預り金" disabled>');`
- NewsPaperVendorMachine
    - `parent::setChangeTag('<input class="change" type="text" name="news_paper_change" size="10" maxlength="5" placeholder="預り金" disabled>');`

### 問題 1.3

問題 1.2 で作成したクラスのインスタンスから `getChangeTag()` を呼び出して、預り金を表示する input タグを表示してください。

※ (何も変わらず) 初期画面が表示できていれば OK です

## 問題 2 - リクエストを保持するクラスの作成

関数だけを定義する `vendor_machine_quiz_function_02.php` ファイルを作成してください。

※ 以降の問題でも `vendor_machine_quiz_function_*.php` ファイルを作成していってください。

### 問題 2.1

UserRequest クラスを作成してください。
そして以下のプライベート変数を定義してください。

- `$drink_item_name;`
- `$drink_money;`
- `$drink_change;`
- `$ice_item_name;`
- `$ice_money;`
- `$ice_change;`
- `$tabacco_item_name;`
- `$tabacco_money;`
- `$tabacco_change;`
- `$news_paper_item_name;`
- `$news_paper_money;`
- `$news_paper_change;`

以下の Setter / Getter メソッドも定義してください。

- `setDrinkItemName`
- `setDrinkMoney`
- `setDrinkChange`
- `setIceItemName`
- `setIceMoney`
- `setIceChange`
- `setTabaccoItemName`
- `setTabaccoMoney`
- `setTabaccoChange`
- `setNewsPaperItemName`
- `setNewsPaperMoney`
- `setNewsPaperChange`

- `getDrinkItemName`
- `getDrinkMoney`
- `getDrinkChange`
- `getIceItemName`
- `getIceMoney`
- `getIceChange`
- `getTabaccoItemName`
- `getTabaccoMoney`
- `getTabaccoChange`
- `getNewsPaperItemName`
- `getNewsPaperMoney`
- `getNewsPaperChange`

### 問題 2.2

リクエスト値がセットされた UserRequest オブジェクトを返却する `getUserRequest($_POST)` 関数を作成してください。
この関数を最初に実行しておいて、常に UserRequest からリクエスト値を扱えるようにしてください。

### 問題 2.3

各種自動販売機のインスタンス生成時の引数に UserRequest のインスタンスを渡すようにしてください。

### 問題 2.4

問題 2.3 で渡されるインスタンスを利用して、プライベート変数 `$item_name`, `$money`, `$change` に値を設定してください。値を設定するときは抽象クラス内の Setter / Getter メソッドを利用してください。

### 問題 2.5

各種自動販売機のクラスに定数 `ITEM_NAME` と `CHANGE` と `MONEY` を定義してください。

- `ITEM_NAME` には以下の文字列を持たせてください。
    - drink_item_name
    - ice_item_name
    - tabacco_item_name
    - news_paper_item_name
- `CHANGE` には以下の文字列を持たせてください。
    - drink_money
    - ice_money
    - tabacco_money
    - news_paper_money
- `MONEY` には以下の文字列を持たせてください。
    - drink_money
    - ice_money
    - tabacco_money
    - news_paper_money

今後、必要に応じてこの定数を参照するようにしてください。

## 問題 3 - 投入した金額を表示する

### 前提条件

- drink_money
- ice_money
- tabacco_money
- news_paper_money

上記 input タグでは、自動販売機に投入するお金を「数値」で入力します。

- pay_drink_money
- pay_ice_money
- pay_tabacco_money
- pay_news_paper_money

上記 input タグ「お金を入れる」ボタン押下によって、入力した数値が自動販売機にお金として投入されます。

### 問題3.1

- drink_change
- ice_change
- tabacco_change
- news_paper_change

上記 input タグでは、現在の預り金を「数値」で表示します。

動的にこの input タグを作成して、`setChangeTag` による保存も実行する `calcChange` 関数を定義してください。
この input タグは `getChangeTag` 関数で表示してください。

※ 一旦、連続でお金を投入した場合のことは考慮しなくて大丈夫です

## 問題 4 - hidden

### 問題 4.1

複数の自動販売機の「お金を入れる」ボタンを押しても、それぞれの自動販売機が現在の預り金を保持できる状態にします。

- drink_money
- ice_money
- tabacco_money
- news_paper_money

disabled が付いたままのタグは POST されないので、disabled を取り除いた hidden 属性の付いたタグを埋め込むようにしてください。

抽象クラスにプライベート変数 `$hidden_change_tag` を宣言して、Setter `setHiddenChangeTag`, Getter `getHiddenChangeTag` の定義をしてください。

### 問題 4.2

連続でお金を投入した場合、前回の預かり金と足し算して、最新の預り金を表示するようにしてください。

## 問題 5 - ボタンの活性・非活性①

### 問題 5.1

- receive_drink_change
- receive_ice_change
- receive_tabacco_change
- receive_news_paper_change

お金を投入したあと、上記 button タグ「お釣り」ボタンを活性化してください。

非活性のときは `value="0"` で、活性のときは `value="1"` としてください。

### 問題 5.2

「お釣り」ボタンを押下した場合、預り金を 0 円にして、「お釣り」ボタンを非活性にするようにします。

UserRequest クラスに以下のプライベート変数 ( bool 型) を定義してください。

- `$is_receive_drink_change;`
- `$is_receive_ice_change;`
- `$is_receive_tabacco_change;`
- `$is_receive_news_paper_change;`

まず、以下の Setter / Getter メソッドを定義してください。

- `setIsReceiveDrinkChange`
- `setIsReceiveIceChange`
- `setIsReceiveTabaccoChange`
- `setIsReceiveNewsPaperChange`

- `getIsReceiveDrinkChange`
- `getIsReceiveIceChange`
- `getIsReceiveTabaccoChange`
- `getIsReceiveNewsPaperChange`

抽象クラス VendorMachine には、プライベート変数 `$is_receive_change` と Setter `setIsRecieveChange`, Getter `getIsRecieveChange` を定義してください。この Getter で取れる値が true の場合、預り金を 0 円にして、「お釣り」ボタンを非活性にしてください。

### 問題 5.3

以下、関数を定義してください。

- isDrink
- isIce
- isTabacco
- isNewsPaper

この関数を実行すれば、オブジェクトがその自動販売機クラスに属しているのか真偽値で得られるものとします。

### 問題 5.4

抽象クラスにプライベート変数 `$message` を宣言して、Setter `setMessage`, Getter `getMessage` の定義をしてください。

- お金を入れたときは `$message` に「■の自動販売機に●円を入れました」を設定します
    - 「ドリンクの自動販売機に130円を入れました」
- お釣りを返すときは `$message` に「■の自動販売機から●円のお釣りをもらいました」を設定します
    - 「130円のお釣りを返しました」を設定します

`chooseMessage($drink, $ice, $tabacco, $news_paper)` 関数を作成して、どれかひとつの自動販売機がメッセージを持っている場合、その値を return するようにしてください。

## 問題 6 - ボタンの活性・非活性②

### 問題 6.1

各種自動販売機のクラスに定数で商品名、値段を持たせてください。

抽象クラスにはプライベート変数 `$prices` を持たせてください。そして以下の Setter / Getter メソッドを定義してください。

- setPrices
    - 自動販売機の場合は `{A => 130, B => 130, C => 130, D => 160, E => 160 }` の連想配列を保存すること
    - コンストラクタの初期値設定で使ってください

- getPrices
    - 自動販売機の場合は `{A => 130, B => 130, C => 130, D => 160, E => 160 }` の連想配列を返却すること
- getPrice
    - 引数に `A` などの商品名を受け取ること
    - 自動販売機の場合は `130` という数値を返却すること

各種自動販売機のクラスのコンストラクタでは setPrices を実行しておいてください。

### 問題 6.2

テンプレートで使っている商品名・値段は定数を使うか、Getter 経由で表示するようにしてください。

### 問題 6.2

- drink_item_name
- ice_item_name
- tabacco_item_name
- news_paper_item_name

上記 button タグは商品購入するときに使います。
もし商品の値段以上のお金を投入していれば、該当する button タグを活性化するようにします。

抽象クラスにはプライベート変数 `$item_name_tags` を持たせてください。そして以下の Setter / Getter メソッドを定義してください。

- `setItemNameTags`
    - 連想配列をセットする
       - キーは商品名
       - 値は button タグの文字列
    - コンストラクタの初期値設定で使ってください
- `setItemNameTag`
    - キーと値を渡して、連想配列に対して要素を 1 つセットする

- `getItemNameTags`
    - 連想配列をゲットする
- `getItemNameTag`
    - 引数に `A` などの商品名を受け取ること
    - button タグの文字列をゲットする

getPrices で取得した連想配列と setItemNameTag で取得した預り金を利用して、setItemNameTag で button タグをセットしてください。表示するときは getItemNameTag を利用してください。

## 問題 7 - 商品の購入

### 問題 7.1

商品を購入してください。そのとき `$message` は「■の自動販売機の▲ (●円) を購入しました」を設定します。

商品の金額だけ預り金を減らしてください。

### 問題 7.2

数値以外が入力されたときは `$message` に「お金は数値で入力してください」を設定してください。

- 数値かどうかの判定を判定する `isInt` 関数を定義してください
- 数値かどうかの判定は正規表現 `'/^[0-9]+$/'` を利用してください
- 数値じゃない場合は NotIntgerException 例外を発生させてください
    - NotIntgerException のエラーメッセージに「お金は数値で入力してください」を設定しておき、setMessage するときはそのエラーメッセージを利用してください

### 問題 7.3

一円玉・五円玉を使った入力受け付けないようにしてください。 ※ つまり、一の位は 0 しか認められません

そのとき `$message` に「■の自動販売機に●円を入れましたが、一円玉・五円玉は使えないため▲円を返却します」を設定してください。

## 問題 8 - 外部ファイル

- class フォルダを作成して、すべての class を外部ファイルとして読み込んでください
    - 外部ファイルは `dirname(__FILE__)` を使った絶対パスで読み込んでください
    - 外部ファイル名はクラス名と一致させてください
- template ファイルからビジネスロジックを排除してください
- 各ファイルに PHP Doc による説明を付けてください (任意)

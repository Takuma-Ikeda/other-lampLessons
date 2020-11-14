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

以下の getter メソッド、および setter メソッドも定義してください。

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

それぞれのコンストラクタで以下 setter メソッドを呼び出してください。

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

- `$item_name;`
- `$drink_money;`
- `$drink_change;`
- `$ice_money;`
- `$ice_change;`
- `$tabacco_money;`
- `$tabacco_change;`
- `$news_paper_money;`
- `$news_paper_change;`

以下の getter メソッド、および setter メソッドも定義してください。

- `setItemName`
- `setDrinkMoney`
- `setDrinkChange`
- `setIceMoney`
- `setIceChange`
- `setTabaccoMoney`
- `setTabaccoChange`
- `setNewsPaperMoney`
- `setNewsPaperChange`
- `getItemName`
- `getDrinkMoney`
- `getDrinkChange`
- `getIceMoney`
- `getIceChange`
- `getTabaccoMoney`
- `getTabaccoChange`
- `getNewsPaperMoney`
- `getNewsPaperChange`

### 問題 2.2

POST されたリクエストを処理して、値がセットされた UserRequest オブジェクトを返却する `getUserRequest($_POST)` 関数を作成してください。
この関数を実行しておき、常に UserRequest にリクエスト値をセットして、値をゲットできるようにしておいてください。

### 問題 2.3

各種自動販売機のインスタンス生成時の引数に UserRequest のインスタンスを渡すようにしてください。

### 問題 2.4

問題 2.3 で渡されるインスタンスを利用して、プライベート変数 `$item_name`, `$money`, `$change` に値を設定してください。値を設定するときは抽象クラス内の setter / getter を利用してください。

### 問題 2.5

抽象クラスに定数 `ITEM_NAME` を定義してください。
各種自動販売機のクラスに定数 `CHANGE` と `MONEY` を定義してください。

`ITEM_NAME` には item_name という文字列を持たせてください。

`CHANGE` には以下の文字列を持たせてください。

- drink_money
- ice_money
- tabacco_money
- news_paper_money

`MONEY` には以下の文字列を持たせてください。

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

抽象クラスに `createChangeTag` という関数を定義して、動的にこの input タグを作成します。
お金を投入したら、預り金を表示する input タグを生成・表示してください。

※ 一旦、連続でお金を投入した場合のことは考慮しなくて大丈夫です

## 問題 4 - hidden

### 問題 4.1

複数の自動販売機の「お金を入れる」ボタンを押しても、それぞれの自動販売機が現在の預り金を保持できている状態にします。

- drink_money
- ice_money
- tabacco_money
- news_paper_money

disabled が付いたタグは POST されないので hidden 属性を付けたタグを埋め込むようにしてください。
現在の預り金を `getChange` で取得できたら、上記 input タグにその金額を表示するようにしてください。

### 問題 4.2

連続でお金を投入した場合、前回の預かり金と足し算して、最新の預り金を表示するようにしてください。

## 問題 5 - ボタンの活性・非活性

### 問題 5.1

- get_drink_change
- get_ice_change
- get_tabacco_change
- get_news_paper_change

お金を投入したあと、上記 input タグ「お釣り」ボタンを活性化してください。
このボタンを押下した場合、預り金をリセットして、再び「お釣り」ボタンを非活性にしてください。

### 問題 5.2

各種自動販売機のクラスに定数として、各商品の値段を持たせておいてください。

### 問題 5.3

- item_name

上記 button タグは商品購入するときに使います。
もし商品の値段以上のお金を投入していれば、該当する button タグを活性化させてください。

## 問題 6 - ボタンの活性・非活性

### 問題 6.1

### 問題 6.2

- pay_drink_money
- pay_ice_money
- pay_tabacco_money
- pay_news_paper_money

お金を投入したあと、上記 input タグは非活性にしてください。



### おまけ

- 数値以外で入力するとエラーを返すようにしてください
- 一円玉・五円玉を受け付けないようにしてください
    - つまり、預り金の一の位は切り捨ててください

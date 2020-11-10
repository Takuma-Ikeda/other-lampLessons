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

テンプレートファイルを用意しているので、[こちら](https://google.com)を流用してください。

## 問題 1 - 自動販売機クラスの作成

クラスだけを定義する `vendor_machine_quiz_class_01.php` ファイルを作成してください。

※ 以降の問題でも `vendor_machine_quiz_class_*.php` ファイルを作成していってください。

### 問題 1.1

抽象クラス VendorMachine を作成してください。
そして以下のプライベート変数を定義してください。

- `private $item_name;`
- `private $money;`
- `private $change;`

以下の getter メソッド、および setter メソッドも定義してください。

- `setItemName($item_name)`
- `setMoney($money)`
- `setChange($change)`
- `getItemName()`
- `getMoney()`
- `getChange()`

### 問題 1.2

抽象クラス VendorMachine を継承している以下のクラスを作成してください。

- DrinkVendorMachine
- IceVendorMachine
- TabaccoVendorMachine
- NewsPaperVendorMachine

それぞれのコンストラクタには以下を定義してください。

- DrinkVendorMachine
    - `$this->change_tag = '<input type="text" name="drink_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';`
    - `$this->money_tag  = '<input type="text" name="drink_money" size="10" maxlength="5" placeholder="数値">';`
- IceVendorMachine
    - `$this->change_tag = '<input type="text" name="ice_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';`
    - `$this->money_tag  = '<input type="text" name="ice_money" size="10" maxlength="5" placeholder="数値">';`
- TabaccoVendorMachine
    - `$this->change_tag = '<input type="text" name="tabacco_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';`
    - `$this->money_tag  = '<input type="text" name="tabacco_money" size="10" maxlength="5" placeholder="数値">';`
- NewsPaperVendorMachine
    - `$this->change_tag = '<input type="text" name="news_paper_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';`
    - `$this->money_tag  = '<input type="text" name="news_paper_money" size="10" maxlength="5" placeholder="数値">';`

### 問題 1.3

問題 1.2 で作成したクラスのインスタンスを用いて、お金を投入する input タグとお釣りを表示する input タグを表示してください。

※ (何も変わらないで) 初期画面が表示できれば OK です

## 問題 2 - リクエストを保持するクラスの作成

関数だけを定義する `vendor_machine_quiz_function_02.php` ファイルを作成してください。

※ 以降の問題でも `vendor_machine_quiz_function_*.php` ファイルを作成していってください。

### 問題 2.1

UserRequest クラスを作成してください。
そして以下のプライベート変数を定義してください。

- `private $item_name;`
- `private $drink_money;`
- `private $drink_change;`
- `private $ice_money;`
- `private $ice_change;`
- `private $tabacco_money;`
- `private $tabacco_change;`
- `private $news_paper_money;`
- `private $news_paper_change;`

以下の getter メソッド、および setter メソッドも定義してください。

- `public function setItemName($item_name)`
- `public function setDrinkMoney($drink_money)`
- `public function setDrinkChange($drink_change)`
- `public function setIceMoney($ice_money)`
- `public function setIceChange($ice_change)`
- `public function setTabaccoMoney($tabacco_money)`
- `public function setTabaccoChange($tabacco_change)`
- `public function setNewsPaperMoney($news_paper_money)`
- `public function setNewsPaperChange($news_paper_change)`
- `public function getItemName()`
- `public function getDrinkMoney()`
- `public function getDrinkChange()`
- `public function getIceMoney()`
- `public function getIceChange()`
- `public function getTabaccoMoney()`
- `public function getTabaccoChange()`
- `public function getNewsPaperMoney()`
- `public function getNewsPaperChange()`

### 問題 2.2

POST されたリクエストを処理して、値がセットされた UserRequest オブジェクトを返却する `getUserRequest($_POST)` 関数を作成してください。
この関数を実行しておき、常に UserRequest にリクエスト値をセットして、値をゲットできるようにしておいてください。

### 問題 2.3

抽象クラス VendorMachine にプライベート変数 `$user_request` を追加してください。

各種自動販売機のコンストラクタの引数に `$user_request;` を渡して、プライベート変数に値を設定してください。

各種自動販売機のインスタンス生成時の引数には UserRequest インスタンスを渡すようにしてください。

### 問題 2.4

各種自動販売機のコンストラクタ内で `$this->user_request;` を利用して、プライベート変数 `$item_name`, `$money`, `$change` に値を設定してください。値を設定するときは抽象クラス内の setter / getter を利用してください。

## 問題 3 - 投入した金額の表示、ボタンの活性化

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

上記 input タグの押下によって、そのお金を自動販売機に投入されます。

### 問題 3.1

- drink_change
- ice_change
- tabacco_change
- news_paper_change

お金を投入したあと、`setMoney($money)`, `getMoney()`, `setChange($change)`, `getChange` を用いて、上記 input タグにその金額が表示されるようにしてください。

※ 投入したお金をいきなりお釣りとして表示できれば OK です。

※ このタグは非活性のままです。

### 問題 3.2

- get_drink_change
- get_ice_change
- get_tabacco_change
- get_news_paper_change

お金を投入したあと、上記 input タグを活性化してください。

### 問題 3.3

- item_name

お金を投入したあと、上記 button タグを活性化してください。

### 問題 3.4

- drink_money
- ice_money
- tabacco_money
- news_paper_money

お金を投入したあと、上記 input タグは非活性にしてください。

### 問題 3.5

- pay_drink_money
- pay_ice_money
- pay_tabacco_money
- pay_news_paper_money

お金を投入したあと、上記 input タグは非活性にしてください。

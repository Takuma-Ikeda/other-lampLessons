# プログラミング研修課題・模範解答

- このリポジトリでは株式会社 EeeeG の LAMP プログラミング研修課題・模範解答を掲載します
- 開発環境は以下リポジトリを利用しています
    - https://github.com/Takuma-Ikeda/docker-LAMP
- プログラミング講義スケジュール
    - https://docs.google.com/spreadsheets/d/1zqvDBn1_HfzoAIE3X0y2dX-0Y88vNHS9FFAX3gXGtgg/edit#gid=0

## 研修課題

`problems` ディレクトリに Markdown ファイルを格納します。

## 解答方法

### あなた専用のローカルブランチを作成する

```sh
# このプロジェクトを clone する
git clone git@github.com:Takuma-Ikeda/other-lampLessons.git

# master ブランチから、あなた専用のブランチを切る
git checkout -b {あなたのブランチ名}
```

### プログラムを作成して push する

`htdocs` 配下にあなたのディレクトリを作成して、そこに解答プログラムを入れてください

```sh
git add .
git commit -m 'なにか分かりやすいメッセージを書く'
git push origin {あなたのブランチ名}
```

### プルリクエストを作成する

push すると GitHub 上にあなたのブランチが作成されます。
あなたのブランチから `master` ブランチ対してプルリクエストを作成してください。

池田がコードレビューします。
ダメなところはコメントするので、修正してください。

#### プログラム修正方法

プログラム修正後、以下のコマンドを実行してください。

```sh
git add .
git commit -m '修正内容を書く'
git push origin {あなたのブランチ名}
```

これで以前作成したプルリクエストに修正が反映されているはずです。

## 模範解答

- `htdocs/answer` にプログラムを格納します

解答はあくまで一例です。
もっと効率的な方法がないか考えてみてください。

# 情報更新

たまに `master` ブランチを修正するので変更を取り込んでください。

```sh
# origin を更新
git fetch origin

# あなたのブランチに master を取り込む
git merge --no-ff origin/master
```

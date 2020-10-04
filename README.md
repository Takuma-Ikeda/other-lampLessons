# リモートリポジトリの変更

https://github.com/Takuma-Ikeda/docker-LAMP を `git clone` して 使っていると、
リモートリポジトリ origin はずっとココを指したままである。

自分の新しいリポジトリで管理したい場合...

1. 名前がややこしいのでプロジェクトのフォルダ名を `docker-LAMP` から変更しておく
1. GitHub に新しいリポジトリを作成する
1. 以下コマンドを実行する

 ```sh
# 現在のリモートリポジトリを確認する
git remote -v

# リモートリポジトリ origin の GitHub URL 変更する
git remote set-url origin {new url}
 ```

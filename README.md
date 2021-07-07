# TEAM28チーム開発 【LINE de 管理】

登録した課題の期日の3日～1日前になるとLINEに通知が届く課題管理アプリ
 
# DEMO

課題登録画面とLINEでの通知画面

![デモ1](https://user-images.githubusercontent.com/82738762/124776463-6e08b280-df7a-11eb-81c2-805a7d46089e.PNG)
![デモ２](https://user-images.githubusercontent.com/82738762/124776479-7103a300-df7a-11eb-8f44-8f85c6fd061d.PNG)

# Features
 
今後ユーザーIDの導入でユーザー毎の課題管理を実装予定
 
# Requirement

使用しているフレームワーク
* CodeIgniter3

使用しているサーバー
* さくらVPS SSD 50GB
 
# Installation

CodeIgniter3のインストール 
https://codeigniter.com/download

サーバーの設定方法は「ネコでもわかる！さくらのVPS講座」を利用
https://knowledge.sakura.ad.jp/serialization/understood-cats-vps/
 
# Usage

サーバー上のアドレス
* https://tamataka.ddo.jp/

LINE Notify アクセストークン発行方法
* LINE Notifyを使ってトークルームにメッセージ送信 https://www.smilevision.co.jp/blog/tsukatte01/
 
# Note
 
### 最新のコードはサーバー運用バージョンのため、ローカル環境で動かすには下記変更が必要

application\config\config.php

* 26行目　⇒　$config['base_url']= 'http://localhost/team28/src/';

application\config\database.php

* 80行目　⇒　パスワードをローカル環境のphpMyAdminのパスワードに変更

application\controllers\Send.php

* 4行目　⇒　LINE_API_TOKENを取得したアクセストークンに置き換える
 
 ### サーバ上で定時にメッセージ送信を行うCronの記述
 * 0 8 *  *  * php /var/www/html/index.php Send index

Cron設定の際の参考サイト
* Codeigniter3をCronで動かす簡単な方法　http://program-memo.com/archives/389
* cronを用いたコマンドの定期実行　https://staffblog.amelieff.jp/entry/2018/07/06/150851
 
# Author
 
作成情報を列挙する
 
* 作成者
* 所属
* E-mail
 
# License


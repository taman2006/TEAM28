# TEAM28チーム開発 【LINE de 管理】

登録した課題の期日の3日～1日前になるとLINEに通知が届く課題管理アプリ
 
# DEMO

課題登録画面とLINEでの通知画面

![デモ1](https://user-images.githubusercontent.com/82738762/124778104-aeb4fb80-df7b-11eb-83a8-61592c470bd6.PNG)
![デモ2](https://user-images.githubusercontent.com/82738762/124778115-afe62880-df7b-11eb-969e-3cd11610595f.PNG)

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
 ### Codeigniterの環境設定
 (application/config/production/)ディレクトリを作成。
 
 参考サイト　https://qiita.com/blues25/items/cbf7b372b1bdedf08c9a
 
 ### サーバ上で定時にメッセージ送信を行うCronの記述
 Codeigniterの環境設定前
 * 0 8 *  *  * php /var/www/html/index.php Send index

 Codeigniterの環境設定後
 * 0 8 * * * CI_ENV=production php /var/www/html/index.php Send index

Cron設定の際の参考サイト
* Codeigniter3をCronで動かす簡単な方法　http://program-memo.com/archives/389
* cronを用いたコマンドの定期実行　https://staffblog.amelieff.jp/entry/2018/07/06/150851
 
# Author
 
作成情報を列挙する
 
* 作成者
* 所属
* E-mail
 
# License


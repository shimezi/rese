# アプリケーション名

Rese
![index](https://github.com/shimezi/rese/assets/108146547/0886576c-5b82-4176-92d5-2b394f3dc4be)

## 作成した目的

自社で予約サービスを持つと経費削減に繋がるため。<br>
初年度でユーザー数 10,000 人達成。<br>

## アプリケーション URL

github : https://github.com/shimezi/rese<br>
開発環境 : http//localhost/<br>
phpMyAdmin : http//localhost:8080/<br>

## 他のリポジトリ<br>

## 機能一覧

会員登録<br>
ログイン<br>
ログアウト<br>
ユーザー情報取得<br>
ユーザーお気に入り一覧取得<br>
ユーザー飲食店予約情報取得<br>
飲食店一覧取得<br>
飲食店お気に入り追加<br>
飲食店お気に入り削除<br>
飲食店予約情報追加<br>
飲食店予約情報削除<br>
エリアで検索する<br>
ジャンルで検索する<br>
店名で検索する<br>

## 仕様技術（実行環境）

PHP 7.4.9<br>
Laravel 8.83.8<br>
MySQL 8.0.26<br>

## テーブル設計

![table](https://github.com/shimezi/rese/assets/108146547/a8c282c2-9151-44fe-a7b0-158259bdf0d5)

## ER 図

![rese](https://github.com/shimezi/rese/assets/108146547/942df0cc-b486-4d83-a5ee-73db7a654517)

# 環境構築

Dockerビルド

1.git clone git@github.com:shimezi/rese.git
2.DockerDesktopアプリを立ち上げる
3.docker-compose up -d --build

Laravel環境構築<br>
1.docker-compose exec php bash<br>
2.composer install<br>
3.「.env.example」を 「.env」に名称変更。<br>
4.「.env」の変更点は以下<br><br>
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

5.アプリケーションキーの作成<br>
php artisan key:generate<br>
6.マイグレーションの実行<br>
php artisan migrate<br>
7.シーディングの実行<br>
php artisan db:seed<br>
8.コントローラーの作成<br>
php artisan make:controller<br>
9.モデルの作成<br>
php artisan make:model<br>
10.リクエストファイルの作成<br>
php artisan make:request<br>
11.ビューファイルを作成<br>
touch ○○.blade.php<br>
12.cssファイルを作成<br>
touch ○○.css<br>

## 他に記載することがあれば記述する

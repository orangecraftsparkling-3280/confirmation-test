## アプリケーション名
　
ユーザーと管理者向けのお問い合わせフォームアプリケーション

## 環境構築
```bash
git clone https://github.com/orangecraftsparkling-3280/confirmation-test.git
cd confirmation-test
docker compose up -d --build
cp src/.env.example src/.env
docker compose exec php composer install
docker compose exec php php artisan key:generate

```
## .envファイル設定
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
### .envファイル設定後実行
```
docker compose exec php php artisan migrate --seed
```

## 実行環境
### Docker環境
- Docker 20.x 以上
- Docker Compose 1.29.x 以上

### コンテナ内サービス
- PHP 8.x
- Laravel 10.x
- MySQL 8.0.26
- Nginx 1.21.1

### ホストOS
- macOS / Windows / Linux（Dockerが動作する環境）

### 推奨ブラウザ
- Chrome / Firefox / Edge（最新バージョン）

## ブラウザでアクセス

アプリケーション: http://localhost

phpMyAdmin: http://localhost:8080

管理画面: http://localhost/admin


## ER図
![ER図](確認テスト用ER図.jpg)
＃アプリケーション名
　
ユーザーと管理者向けのお問い合わせフォームアプリケーション

##環境構築
```bash
git clone https://github.com/orangecraftsparkling-3280/confirmation-test.git
cd confirmation-test
docker compose up -d --build
docker compose exec php bash
composer install
cp .env.example .src/env
exit
docker compose exec php php artisan key:generate
docker compose exec php php artisan migrate
docker compose exec php php artisan db:seed

##.envファイル設定
DB_CONNECTION: mysql
DB_HOST: mysql （Docker サービス名に一致）
DB_PORT: 3306
DB_DATABASE: laravel_db
DB_USERNAME: laravel_user
DB_PASSWORD: laravel_pass
```
##実行環境
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

##ブラウザでアクセス

アプリケーション: http://localhost

phpMyAdmin: http://localhost:8080

管理画面　http://localhost/admin

ER図
![alt text](確認テスト用ER図.jpg)
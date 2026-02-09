# movie-cda
projet de cours CDA movie

## 1 Cloner ou fork du repository
```sh
git clone https://github.com/mithridatem/movie-cda.git
cd movie-cda
```

## 2 Installer les dépendances
```sh
composer install
```

## 3 Paramètrer le fichier .env
```sh
# créer ou éditer .env
APP_ENV=dev
APP_SECRET=
APP_SHARE_DIR=var/share
DEFAULT_URI=http://localhost
DATABASE_URL=
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
MAILER_DSN=null://null
# créer ou éditer .env.dev
APP_SECRET=e72cbda888eb6d60b401bec9e2d9aa6a 
DATABASE_URL="mysql://root:@127.0.0.1:3306/movie-cda?serverVersion=10.4.32-MariaDB&charset=utf8mb4"
```

## 4 Créer la base de données
```sh
symfony console d:d:c
```

## 5 Générer les migrations
```sh
symfony console make:migration
```

## 6 Appliquer les migrations
```sh
symfony console d:m:m
```

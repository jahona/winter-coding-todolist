# Install

### Installing the Dependencies

```
$ sudo apt-get update
$ sudo apt-get install curl php-cli php-mbstring git unzip
```

### Downloading and Installing Composer

Composer provides an installer, written in PHP. Make sure you're in your home directory, and retrieve the installer using curl:

```
$ cd ~
$ curl -sS https://getcomposer.org/installer -o composer-setup.php
```

Next, run a short PHP script to verify that the installer matches the SHA-384 hash for the latest installer found on the Composer Public Keys / Signatures page. You will need to make sure that you substitute the latest hash for the highlighted value below:

```
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```

To install composer globally, use the following:

```
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

### composer install

To start using Composer in your project, all you need is a composer.json file. This file describes the dependencies of your project and may contain other metadata as well. use the following:

```
$ cd winter-coding-todolist
$ composer install
```

### key generate

You should copy .env from .env.example file and generate key, use the following:

```
$ cp .env.example .env
$ php artisan key:generate
```

Automatically, generated key will set APP_KEY in .env

```
// .env
APP_KEY=base64:{{KEY}}
```

# DB Setting

You should input DB information in your .env for using DB

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

# Nginx

If you install Nginx, you may use php-fpm. use the following:

```
$ vi /etc/nginx/sites-available/default
```

```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    server_name _;
    root /home/ubuntu/winter-coding-todolist/public;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ [^/]\.php(/|$) {
        fastcgi_split_path_info ^(.+?\.php)(/.*)$;
        if (!-f $document_root$fastcgi_script_name) {
            return 404;
        }

        fastcgi_pass unix:/run/php/php7.2-fpm.sock;
        fastcgi_index index.php;
        include fastcgi.conf;
    }

    location ~ /\.ht {
        deny all;
    }
}

```

now, you can access '/' route. you will see welcome page

If you are denied storage/* access from the server, you should solve accessing stroage folder problem

ref : https://stackoverflow.com/questions/37649269/laravel-proper-permissions

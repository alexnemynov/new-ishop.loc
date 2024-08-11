# new-ishop.loc

Проект интернет магазина на нативном PHP

#### Stack:

- [PHP] 8.3.7
- [PostgreSQL] 16
- [Nginx] 1.26.1
- [Redis] 5.0.14.1

## Local Developing

Для тех, у кого Windows

##### Настройки nginx.conf 

server {
    	listen 80;
    	server_name _;
    	index index.php;
    	error_log c:/nginx-1.26.1/logs/localhost.error.log;
    	access_log c:/nginx-1.26.1/logs/localhost.access.log;
    	root c:/nginx-1.26.1/html/new-ishop.loc/public/;

    	location / {
        	try_files $uri /index.php$is_args$args;
		# rewrite ^(.*)$ /public/$1;
		}

    	location ~ \.php {
        	try_files $uri =404;
        	fastcgi_split_path_info ^(.+\.php)(/.+)$;
        	include fastcgi_params;
        	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        	fastcgi_param SCRIPT_NAME $fastcgi_script_name;
        	fastcgi_index index.php;
        	fastcgi_pass 127.0.0.1:9123;
    	}    
    }

##### Запуск:
Клонировать проект в C:\nginx-1.26.1\html\new-ishop.loc
$ composer install

$ cd c:\nginx-1.26.1
$ start nginx
$ cd c:\php-8.3.7
$ php-cgi.exe -b 127.0.0.1:9123

Перейти [Главная](http://localhost/)

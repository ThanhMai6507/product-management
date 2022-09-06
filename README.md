#### First time only
* Start container
```
[/***/product-management]
$ docker-compose up -d --build
```

* Database migrate
```
[/***/product-management]
$ docker-compose exec app ash
[/work/product-management]
$ composer install
$ cp .env-example .env
$ php artisan key:generate
$ php artisan config:cache
$ php artisan migrate
```

※ The development location is the source in the _src_ folder directly under.
- URL：http://127.0.0.1:9000

#### After the second time
```
[/***/product-management]
$ docker-compose up -d
```

#### When deleting
```
[/***/product-management]
$ docker-compose down
```

#### When deleting the entire image
```
[/***/product-management]
$ docker-compose down --volumes --rmi all
```

#### DB connection

* Access the DB locally with a tool such as MySQL Workbench
Set the following information in the tool.

| Key | Value |
| --- | --- |
| Host | 127.0.0.1 |
| Port | 33061 |
| User | homestead |
| Pass | secret |

TimeDev team official site
==========================

Официальный сайт группы.

## Установка

### Шаг 1: Склонировать репозиторий:

``` bash
$ git clone https://github.com/TDTeam/site.git
$ cd site
```

### Шаг 2: Установить зависимые пакеты:

``` bash
$ php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
$ php composer.phar install
```

### Шаг 3: Создание БД:

``` bash
$ app/console doctrine:database:create
```

### Шаг 4: Загрузка демо-данных:

``` bash
$ app/console doctrine:fixtures:load
```

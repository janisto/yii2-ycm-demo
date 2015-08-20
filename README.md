# yii2-ycm-demo

- [Github Project](https://github.com/janisto/yii2-ycm)
- [Demo](https://github.com/janisto/yii2-ycm-demo)
- [Forum topic](http://www.yiiframework.com/forum/index.php/topic/67352-module-ycm-yii-2-content-management-module/)

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this demo using the following command:

~~~
$ cd /path/to/web/root
$ php composer.phar global require "fxp/composer-asset-plugin:~1.0.0"
$ php composer.phar create-project --prefer-dist --stability=dev janisto/yii2-ycm-demo yii2-ycm-demo
~~~

Create database `yii2-ycm-demo`

Edit config/db.php if needed

Run migrations:
~~~
$ php yii migrate/up --interactive=0
~~~

Now you should be able to access the demo through the following URL, assuming `yii2-ycm-demo` is the directory
directly under the Web root.

~~~
http://localhost/yii2-ycm-demo/web/admin
~~~

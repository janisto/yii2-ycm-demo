# yii2-ycm-demo


## Install

Create database yii2-ycm-demo

Extract files to a directory named yii2-ycm-demo that is directly under the web root.

You can then access the application through the following URL: http://localhost/yii2-ycm-demo/web/

$ php composer.phar global require "fxp/composer-asset-plugin:~1.0.0"

$ cd /path/to/web/root

$ git clone git@github.com:janisto/yii2-ycm-demo.git

$ cd yii2-ycm-demo

$ php composer.phar self-update

$ php composer.phar install --prefer-dist

Edit config/db.php if needed

$ php yii migrate/up --interactive=0
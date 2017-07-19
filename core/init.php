<?php



$app = [];
$app['config'] = require 'config.php';

require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'include/template2.inc.php';

$app['database'] = new QueryBuilder(
    Connection::connect($app['config']['database'])
);



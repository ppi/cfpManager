<?php
require_once 'PPI/PPI/init.php';
$app = new PPI\App();

$app->ds = true;

$app->boot()->dispatch();

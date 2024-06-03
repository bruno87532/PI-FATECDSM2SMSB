<?php
require_once __DIR__."/utils/autoload.php";
require_once __DIR__.'/routes/routes.php';

$core = new Core();
$core->run($routes);

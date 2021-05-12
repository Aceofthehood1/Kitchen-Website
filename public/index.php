<?php
require '../autoload.php';
$routes = new \Kdb\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
?>

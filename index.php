<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

require_once 'vendor/autoload.php';

$app = new \Analytics\Roistat(1111, 'f9b21f2e3ecf72b34753caa7a6509e19');
print_r($app->Project()->getProjects());

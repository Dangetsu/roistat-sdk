<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

require_once 'vendor/autoload.php';

$app = new \Analytics\Roistat('f9b21f2e3ecf72b34753caa7a6509e19', 1111);

try {
    print_r(
        $app->Counter()->get()
    );
} catch (\Analytics\Engine\Exception\AuthException $e) {
    die($e->getMessage());
} catch (\Analytics\Engine\Exception\BasicException $e) {
    die($e->getMessage());
}

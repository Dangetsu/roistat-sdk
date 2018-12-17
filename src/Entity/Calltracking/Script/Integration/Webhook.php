<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Integration;

use Analytics\Entity;

/**
 * @method string getUrl()
 * @method self setUrl(string $value)
 */
class Webhook extends Entity\AbstractEntity {
    /** @var string */
    protected $url;
}
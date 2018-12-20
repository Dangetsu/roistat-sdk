<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method string getDisplayName()
 * @method string getIconUrl()
 * @method float getValue()
 * @method string getSystemName()
 */
class MarkerDuration extends Entity\AbstractEntity {
    /** @var string */
    protected $displayName;
    /** @var string */
    protected $iconUrl;
    /** @var float */
    protected $value;
    /** @var string */
    protected $systemName;
}
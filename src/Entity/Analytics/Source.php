<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Analytics;

use Analytics\Entity;

/**
 * @method string getSource()
 * @method string getName()
 * @method string getType()
 * @method int getLevel()
 * @method string getIcon()
 */
class Source extends Entity\AbstractEntity {

    /** @var string */
    protected $source;

    /** @var string */
    protected $name;

    /** @var string */
    protected $type;

    /** @var int */
    protected $level;

    /** @var string */
    protected $icon;

}
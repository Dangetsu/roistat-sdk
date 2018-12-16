<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getName()
 * @method string getType()
 * @method self setName(string $value)
 * @method self setType(string $value)
 */
class Status extends AbstractEntity {
    /** @var string */
    protected $type;
    /** @var string */
    protected $name;
}
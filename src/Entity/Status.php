<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getName()
 * @method string getType()
 * @method Status setName(string $value)
 * @method Status setType(string $value)
 */
class Status extends AbstractEntity {

    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

}
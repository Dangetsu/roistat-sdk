<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getCode()
 * @method Counter setCode($value)
 */
class Counter extends AbstractEntity {

    /** @var string */
    protected $code;

}
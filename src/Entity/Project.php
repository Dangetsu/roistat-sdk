<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getName()
 * @method string getProfit()
 * @method string getCreationDate()
 * @method string getCurrency()
 * @method int getIsOwner()
 * @method Counter getCounter()
 * @method Project setName(string $value)
 * @method Project setProfit(string $value)
 * @method Project setCreationDate(string $value)
 * @method Project setCurrency(string $value)
 * @method Project setIsOwner(int $value)
 * @method Project setCounter(Counter $counter)
 */
class Project extends AbstractEntity {

    /** @var string */
    protected $name;

    /** @var string */
    protected $profit;

    /** @var string */
    protected $creation_date;

    /** @var string */
    protected $currency;

    /** @var int */
    protected $is_owner;

    /** @var Counter */
    protected $counter;

}
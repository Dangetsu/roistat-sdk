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
 * @method self setName(string $value)
 * @method self setProfit(string $value)
 * @method self setCreationDate(string $value)
 * @method self setCurrency(string $value)
 * @method self setIsOwner(int $value)
 * @method self setCounter(Counter $counter)
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
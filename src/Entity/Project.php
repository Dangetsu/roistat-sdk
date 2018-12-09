<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

class Project extends AbstractEntity {
    /** @var string */
    public $name;
    /** @var string */
    public $profit;
    /** @var string */
    public $creation_date;
    /** @var string */
    public $currency;
    /** @var int */
    public $is_owner;
    /** @var Counter */
    public $counter;
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method OrderAdd setName(string $value)
 * @method OrderAdd setDateCreate(string $value)
 * @method OrderAdd setStatus(string $value)
 * @method OrderAdd setRoistat(string $value)
 * @method OrderAdd setPrice(string $value)
 * @method OrderAdd setCost(string $value)
 * @method OrderAdd setClientId(string $value)
 * @method OrderAdd setFields(array $fields)
 */
class OrderAdd extends AbstractEntity {

    /** @var string */
    protected $name;

    /** @var string */
    protected $date_create;

    /** @var string */
    protected $status;

    /** @var string */
    protected $roistat;

    /** @var array */
    protected $price;

    /** @var string */
    protected $cost;

    /** @var string */
    protected $client_id;

    /** @var array */
    protected $fields;

}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method self setName(string $value)
 * @method self setDateCreate(string $value)
 * @method self setStatus(string $value)
 * @method self setRoistat(string $value)
 * @method self setPrice(string $value)
 * @method self setCost(string $value)
 * @method self setClientId(string $value)
 * @method self setFields(array $fields)
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
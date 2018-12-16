<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getTitle()
 * @method string getText()
 * @method string getName()
 * @method string getPhone()
 * @method string getEmail()
 * @method string getRoistat()
 * @method string getCreationDate()
 * @method string getOrderId()
 * @method array getOrderFields()
 */
class Proxylead extends AbstractEntity {
    /** @var string */
    protected $title;
    /** @var string */
    protected $text;
    /** @var string */
    protected $name;
    /** @var string */
    protected $phone;
    /** @var string */
    protected $email;
    /** @var string */
    protected $roistat;
    /** @var string */
    protected $creation_date;
    /** @var string */
    protected $order_id;
    /** @var array */
    protected $order_fields;
}
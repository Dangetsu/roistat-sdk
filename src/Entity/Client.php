<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getName()
 * @method string getPhone()
 * @method string getEmail()
 * @method string getCompany()
 * @method array getFields()
 * @method string getBirthDate()
 * @method string getFirstVisitDate()
 * @method string getExternalId()
 * @method string getFirstOrderDate()
 * @method string getLastOrderDate()
 * @method int getOrderCount()
 * @method int getRevenue()
 * @method int getProfit()
 * @method string getComment()
 * @method string getClientUrl()
 * @method string getFirstVisitMarker()
 * @method string getFirstVisitMarkerAlias()
 * @method string getFirstVisitMarkerIcon()
 * @method string getFirstVisitMarkerAliasLevel_1()
 * @method Client setName(string $value)
 * @method Client setPhone(string $value)
 * @method Client setEmail(string $value)
 * @method Client setCompany(string $value)
 * @method Client setFields(array $value)
 * @method Client setBirthDate(string $value)
 */
class Client extends AbstractEntity {

    /** @var string */
    protected $name;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $email;

    /** @var string */
    protected $company;

    /** @var array */
    protected $fields;

    /** @var string */
    protected $birth_date;

    /** @var string */
    protected $first_visit_date;

    /** @var string */
    protected $external_id;

    /** @var string */
    protected $first_order_date;

    /** @var string */
    protected $last_order_date;

    /** @var int */
    protected $order_count;

    /** @var int */
    protected $revenue;

    /** @var int */
    protected $profit;

    /** @var string */
    protected $comment;

    /** @var string */
    protected $client_url;

    /** @var string */
    protected $first_visit_marker;

    /** @var string */
    protected $first_visit_marker_alias;

    /** @var string */
    protected $first_visit_marker_icon;

    /** @var string */
    protected $first_visit_marker_alias_level_1;

}
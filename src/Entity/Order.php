<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

use Analytics\Scheme;

/**
 * @method string getUrl()
 * @method string getSourceType()
 * @method string getCreationDate()
 * @method string getUpdateDate()
 * @method array getRevenue()
 * @method string getCost()
 * @method string getClientId()
 * @method string getVisitId()
 * @method string getCustomFields()
 * @method Status getStatus()
 * @method Visit getVisit()
 * @method string getPage()
 */
class Order extends AbstractEntity {

    /** @var Scheme\Order */
    protected $_scheme;

    /** @var string */
    protected $url;

    /** @var string */
    protected $source_type;

    /** @var string */
    protected $creation_date;

    /** @var string */
    protected $update_date;

    /** @var array */
    protected $revenue;

    /** @var string */
    protected $cost;

    /** @var string */
    protected $client_id;

    /** @var string */
    protected $visit_id;

    /** @var array */
    protected $custom_fields;

    /** @var Status */
    protected $status;

    /** @var Visit */
    protected $visit;

    /** @var string */
    protected $page;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'status':
                return ['class' => Status::getClass(), 'is_multiple' => false];
                break;
            case 'visit':
                return ['class' => Visit::getClass(), 'is_multiple' => false];
                break;
        }
        return null;
    }
}
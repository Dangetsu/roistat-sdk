<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getFirstVisitId()
 * @method string getDate()
 * @method string getLandingPage()
 * @method string getHost()
 * @method string getGoogleClientId()
 * @method string getMetrikaClientId()
 * @method string getIp()
 * @method string getRoistatParam1()
 * @method string getRoistatParam2()
 * @method string getRoistatParam3()
 * @method string getRoistatParam4()
 * @method string getRoistatParam5()
 * @method Device getDevice()
 * @method Source getSource()
 * @method Geo getGeo()
 * @method int[] getOrderIds()
 * @method int getCost()
 * @method array getAbTest()
 */
class SiteVisit extends AbstractEntity {
    /** @var string */
    protected $first_visit_id;
    /** @var string */
    protected $date;
    /** @var string */
    protected $landing_page;
    /** @var string */
    protected $host;
    /** @var string */
    protected $google_client_id;
    /** @var string */
    protected $metrika_client_id;
    /** @var string */
    protected $ip;
    /** @var string */
    protected $roistat_param1;
    /** @var string */
    protected $roistat_param2;
    /** @var string */
    protected $roistat_param3;
    /** @var string */
    protected $roistat_param4;
    /** @var string */
    protected $roistat_param5;
    /** @var Device */
    protected $device;
    /** @var Source */
    protected $source;
    /** @var Geo */
    protected $geo;
    /** @var string[] */
    protected $order_ids;
    /** @var int */
    protected $cost;
    /** @var array */
    protected $ab_test;

    public function __construct(array $data = []) {
        parent::__construct($data);
        $this->device = new Device($this->device);
        $this->source = new Source($this->source);
        $this->geo = new Geo($this->geo);
    }
}
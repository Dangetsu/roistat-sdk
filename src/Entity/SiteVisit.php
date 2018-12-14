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
 * @method array getDevice()
 * @method array getSource()
 * @method array getGet()
 * @method string[] getOrderIds()
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

    /**
     * todo: new entity
     * @var array
     */
    protected $device;
    /**
     * todo: new entity
     * @var array
     */
    protected $source;
    /**
     * todo: new entity
     * @var array
     */
    protected $geo;

    /** @var string[] */
    protected $order_ids;
}
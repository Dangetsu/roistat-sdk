<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Integration;

use Analytics\Entity;

/**
 * @method string getTrackingId()
 * @method string getAction()
 * @method string getCategory()
 * @method string getLabel()
 * @method GoogleAnalytics setTrackingId(string $value)
 * @method GoogleAnalytics setAction(string $value)
 * @method GoogleAnalytics setCategory(string $value)
 * @method GoogleAnalytics setLabel(string $value)
 */
class GoogleAnalytics extends Entity\AbstractEntity {

    /** @var string */
    protected $tracking_id;

    /** @var string */
    protected $action;

    /** @var string */
    protected $category;

    /** @var string */
    protected $label;

}
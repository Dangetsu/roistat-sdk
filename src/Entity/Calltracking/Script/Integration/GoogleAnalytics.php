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
 * @method self setTrackingId(string $value)
 * @method self setAction(string $value)
 * @method self setCategory(string $value)
 * @method self setLabel(string $value)
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
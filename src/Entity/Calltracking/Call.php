<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;
use Analytics\Scheme;
use Analytics\Engine\Exception;

/**
 * @method string getCallee()
 * @method string getCaller()
 * @method int getDuration()
 * @method string getStatus()
 * @method string getDate()
 * @method string getVisitId()
 * @method string getOrderId()
 * @method Entity\Visit\Source getStaticSource()
 * @method string getComment()
 * @method Entity\Visit getVisit()
 * @method Entity\Order getOrder()
 * @method string getLink()
 * @method int getWaitingTime()
 * @method int getAnswerDuration()
 * @method Call setCallee(string $phone)
 * @method Call setCaller(string $phone)
 * @method Call setDate(string $date)
 * @method Call setDuration(int $duration)
 * @method Call setMarker(string $marker)
 * @method Call setOrderId(string $orderId)
 * @method Call setSaveToCrm(string $value)
 * @method Call setStatus(string $status)
 * @method Call setVisitId(string $visitId)
 * @method Call setComment(string $comment)
 * @method Call setAnswerDuration(string $value)
 * @method Call setLink(string $link)
 */
class Call extends Entity\AbstractEntity {
    /** @var array */
    protected $_entityFields = [
        'static_source' => '..\\Visit\\Source',
        'visit'         => '..\\Visit',
        'order'         => '..\\Order',
    ];
    /** @var Scheme\Calltracking\Call */
    protected $_scheme;
    /** @var string */
    protected $callee;
    /** @var string */
    protected $caller;
    /** @var int */
    protected $duration;
    /** @var string */
    protected $status;
    /** @var string */
    protected $date;
    /** @var string */
    protected $visit_id;
    /** @var string */
    protected $order_id;
    /** @var Entity\Visit\Source */
    protected $static_source;
    /** @var string */
    protected $comment;
    /** @var Entity\Visit */
    protected $visit;
    /** @var Entity\Order */
    protected $order;
    /** @var string */
    protected $link;
    /** @var int */
    protected $waiting_time;
    /** @var int */
    protected $answer_duration;
    /** @var string */
    protected $marker;
    /** @var string */
    protected $save_to_crm;

    /**
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function update() {
        return $this->_scheme->update($this);
    }
}
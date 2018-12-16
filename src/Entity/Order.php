<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

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
     * Order constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        if ($this->visit !== null) $this->visit = new Visit($this->visit);
        if ($this->status !== null) $this->status = new Status($this->status);
    }
}
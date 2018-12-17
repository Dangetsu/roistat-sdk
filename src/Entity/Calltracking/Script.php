<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;

/**
 * @method string getName()
 * @method string getCreationDate()
 * @method int getIsEnabled()
 * @method int getCallCount()
 * @method int getAccuracy()
 *
 * @method Script\Options getOptions()
 * @method Script\Integration getIntegration()
 *
 * @method int getNeededPhoneCount()
 */
class Script extends Entity\AbstractEntity {
    /** @var string */
    protected $name;
    /** @var string */
    protected $creation_date;
    /** @var int */
    protected $is_enabled;
    /** @var int */
    protected $call_count;
    /** @var int */
    protected $accuracy;
    /** @var Script\Options */
    protected $options;
    /** @var Script\Integration */
    protected $integration;
    /** @var int */
    protected $needed_phone_count;

    /**
     * Script constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        if ($this->options !== null) $this->options = new Script\Options($this->options);
        if ($this->integration !== null) $this->integration = new Script\Integration($this->integration);
    }
}
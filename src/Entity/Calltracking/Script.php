<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;
use Analytics\Scheme;
use Analytics\Engine\Exception;

/**
 * @method string getName()
 * @method string getCreationDate()
 * @method int getIsEnabled()
 * @method int getCallCount()
 * @method int getAccuracy()
 * @method Script\Options getOptions()
 * @method Script\Integration getIntegration()
 * @method int getNeededPhoneCount()
 * @method Script setName(string $value)
 * @method Script setCreationDate(string $value)
 * @method Script setIsEnabled(int $value)
 * @method Script setOptions(Script\Options $options)
 * @method Script setIntegration(Script\Integration $integration)
 */
class Script extends Entity\AbstractEntity {
    /** @var Scheme\Calltracking\Script */
    protected $_scheme;
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
    protected $options = 'Script\\Options';
    /** @var Script\Integration */
    protected $integration = 'Script\\Integration';
    /** @var int */
    protected $needed_phone_count;

    /**
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function update() {
        return $this->_scheme->update($this);
    }
}
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
 * @method Script\Options getOptions()
 * @method Script\Integration getIntegration()
 * @method int getNeededPhoneCount()
 * @method self setName(string $value)
 * @method self setCreationDate(string $value)
 * @method self setIsEnabled(int $value)
 * @method self setOptions(Script\Options $options)
 * @method self setIntegration(Script\Integration $integration)
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
    protected $options = 'Script\\Options';
    /** @var Script\Integration */
    protected $integration = 'Script\\Integration';
    /** @var int */
    protected $needed_phone_count;
}
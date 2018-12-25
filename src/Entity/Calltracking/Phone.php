<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;

/**
 * @method string getPhone()
 * @method string getPrefix()
 * @method string getScriptId()
 * @method int getIsExternal()
 * @method string getLastUseDate()
 * @method int getCallCount()
 * @method string getCreationDate()
 * @method Script getScript()
 * @method int getNeededPhoneCount()
 */
class Phone extends Entity\AbstractEntity {

    /** @var string */
    protected $phone;

    /** @var string */
    protected $prefix;

    /** @var string */
    protected $script_id;

    /** @var int */
    protected $is_external;

    /** @var string */
    protected $last_use_date;

    /** @var int */
    protected $call_count;

    /** @var string */
    protected $creation_date;

    /** @var Script */
    protected $script;

    /** @var int */
    protected $needed_phone_count;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'script':
                return ['class' => Script::getClass(), 'is_multiple' => false];
                break;
        }
        return null;
    }
}
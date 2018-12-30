<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;
use Analytics\Scheme;

/**
 * @method string getPhone()
 * @method string getPrefix()
 * @method int getScriptId()
 * @method int getIsExternal()
 * @method string getLastUseDate()
 * @method int getCallCount()
 * @method string getCreationDate()
 * @method Script getScript()
 * @method int getNeededPhoneCount()
 * @method Phone setLastUseDate(string $date)
 * @method Phone setScriptId(int $scriptId)
 */
class Phone extends Entity\AbstractEntity {

    /** @var Scheme\Calltracking\Phone */
    protected $_scheme;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $prefix;

    /** @var int */
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
     * @return bool
     */
    public function delete() {
        return $this->_scheme->delete([$this->phone]);
    }

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
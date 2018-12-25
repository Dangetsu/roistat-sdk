<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Integration;

use Analytics\Entity;

/**
 * @method int getEnabled()
 * @method Crm\CustomFields[] getCustomFields()
 * @method Crm setEnabled(int $value)
 * @method Crm setCustomFields(Crm\CustomFields[] $customFields)
 */
class Crm extends Entity\AbstractEntity {

    /** @var int */
    protected $enabled;

    /** @var Crm\CustomFields[] */
    protected $custom_fields;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'custom_fields':
                return ['class' => Crm\CustomFields::getClass(), 'is_multiple' => true];
                break;
        }
        return null;
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Integration;

use Analytics\Entity;

/**
 * @method int getEnabled()
 * @method Crm\CustomFields[] getCustomFields()
 * @method self setEnabled(int $value)
 * @method self setCustomFields(Crm\CustomFields[] $customFields)
 */
class Crm extends Entity\AbstractEntity {
    /** @var array */
    protected $_entityFields = [
        'custom_fields' => 'Crm\\CustomFields[]',
    ];
    /** @var int */
    protected $enabled;
    /** @var Crm\CustomFields[] */
    protected $custom_fields;
}
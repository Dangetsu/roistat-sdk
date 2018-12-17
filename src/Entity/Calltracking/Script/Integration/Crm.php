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
    /** @var int */
    protected $enabled;
    /** @var Crm\CustomFields[] */
    protected $custom_fields;

    /**
     * Crm constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        if ($this->custom_fields !== null) {
            $custom_fields = [];
            foreach ($this->custom_fields as $field) {
                $custom_fields[] = new Crm\CustomFields($field);
            }
            $this->custom_fields = $custom_fields;
        }
    }
}
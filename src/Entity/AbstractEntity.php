<?php
/**
 * @author Alatorcev Vladislav <clannad_forever@mail.ru>
 */

namespace Analytics\Entity;

abstract class AbstractEntity {

    /**
     * @var int
     */
    public $id;

    /**
     * @param array $data
     */
    public function __construct(array $data = []) {
        $names = array_keys(get_object_vars($this));
        foreach ($names as $name) {
            if (!array_key_exists($name, $data)) {
                continue;
            }
            $this->$name = $data[$name];
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        $result = [];
        $properties = get_object_vars($this);
        foreach ($properties as $name => $value) {
            if ($value === null) {
                continue;
            }
            /** @var AbstractEntity $value */
            if (is_object($value)) {
                $value = $value->jsonSerialize();
            }
            
            $result[$name] = $value;
        }
        return $result;
    }
}
<?php
/**
 * @author Alatorcev Vladislav <clannad_forever@mail.ru>
 */

namespace Analytics\Entity;

/**
 * @method int getId()
 * @method self setId(int $value)
 */
abstract class AbstractEntity implements \JsonSerializable {
    /**
     * @var int
     */
    protected $id;

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
     * @param string $name
     * @param array $arguments
     * @return mixed $this
     */
    public function __call($name, $arguments) {
        if (preg_match('/^(get|set)(.+)/', $name,$match)) {
            $methodType = $match[1];
            $propertyName = mb_strtolower(preg_replace('/\B[A-Z]/', '_$0', $match[2]));
            if (!property_exists($this, $propertyName)) {
                return false;
            }

            if ($methodType === 'get') {
                return $this->{$propertyName};
            }
            $this->{$propertyName} = array_key_exists(0, $arguments) ? $arguments[0] : null;
            return $this;
        }
        return false;
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
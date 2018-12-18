<?php
/**
 * @author Alatorcev Vladislav <clannad_forever@mail.ru>
 */

namespace Analytics\Entity;

use Analytics\Scheme;

/**
 * @method int getId()
 * @method self setId(int $value)
 */
abstract class AbstractEntity implements \JsonSerializable {
    /** @var int */
    protected $id;
    /** @var Scheme\AbstractScheme */
    protected $_scheme;

    /**
     * @param Scheme\AbstractScheme $scheme
     */
    public function __construct($scheme = null) {
        $this->_scheme = $scheme;
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
     * @param array $data
     * @return mixed
     */
    public function load(array $data = []) {
        $names = array_keys(get_object_vars($this));
        foreach ($names as $name) {
            if (!array_key_exists($name, $data)) {
                continue;
            }
            if ($this->$name !== null) {
                $this->$name = $this->_loadEntityWithCheckRecursive($data, $name);
                continue;
            }
            $this->$name = $data[$name];
        }
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        $result = [];
        $properties = get_object_vars($this);
        foreach ($properties as $name => $value) {
            if ($name{0} === '_' || $value === null) {
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

    /**
     * @param array $data
     * @param string $name
     * @return AbstractEntity|AbstractEntity[]
     */
    private function _loadEntityWithCheckRecursive(array $data, $name) {
        if (mb_strpos($this->$name, '[]') === false) {
            return $this->_loadEntity(__NAMESPACE__ . "\\{$this->$name}", $data[$name]);
        }

        $result = [];
        $entityName = str_replace('[]', '', $this->$name);
        foreach ($data[$name] as $datum) {
            $result[] = $this->_loadEntity(__NAMESPACE__ . "\\{$entityName}", $datum);
        }
        return $result;
    }

    /**
     * @param string $entityNamespace
     * @param array $content
     * @return AbstractEntity
     */
    private function _loadEntity($entityNamespace, array $content) {
        /** @var self $entity */
        $entity = new $entityNamespace($this->_scheme);
        $entity->load($content);
        return $entity;
    }
}
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
            $propertyName = $this->_getPropertyName($match[2]);
            if ($propertyName === null) {
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
     * @param string $checkName
     * @return string
     */
    private function _getPropertyName($checkName) {
        $camelCasePropertyName = lcfirst($checkName);
        if (property_exists($this, $camelCasePropertyName)) {
            return $camelCasePropertyName;
        }
        $propertyName = mb_strtolower(preg_replace('/\B[A-Z]/', '_$0', $checkName));
        if (property_exists($this, $propertyName)) {
            return $propertyName;
        }
        return null;
    }

    /**
     * @param array $data
     * @param string $name
     * @return AbstractEntity|AbstractEntity[]
     */
    private function _loadEntityWithCheckRecursive(array $data, $name) {
        $namespace = substr(get_class($this), 0, strrpos(get_class($this), '\\'));
        $entityName = str_replace('[]', '', $this->$name);
        if (mb_strpos($this->$name, '[]') === false) {
            return $this->_loadEntity("{$namespace}\\{$entityName}", $data[$name]);
        }

        $result = [];
        foreach ($data[$name] as $datum) {
            $result[] = $this->_loadEntity("{$namespace}\\{$entityName}", $datum);
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
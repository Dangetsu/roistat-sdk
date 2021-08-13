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
     * @return string
     */
    public static function getClass() {
        return get_called_class();
    }

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
            if (!array_key_exists($name, $data) || $data[$name] === null) {
                continue;
            }
            $this->$name = $this->_importField($data, $name);
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
            if ($name[0] === '_' || $value === null) {
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
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        return null;
    }

    /**
     * @param array $data
     * @param string $name
     * @return mixed
     */
    private function _importField(array $data, $name) {
        $propertySettings = $this->_getPropertySettings($name);
        if ($propertySettings !== null && $propertySettings['is_multiple']) {
            return array_map(function ($item) use ($propertySettings) {
                return $this->_loadEntity($propertySettings['class'], $item);
            }, $data[$name]);
        }
        if ($propertySettings !== null) {
            return $this->_loadEntity($propertySettings['class'], $data[$name]);
        }
        return $data[$name];
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

<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

abstract class AbstractScheme {
    /** @var string */
    protected $_entityName;

    /**
     * @param array $items
     * @return mixed
     */
    protected function _buildEntity(array $items) {
        $class_name = "Analytics\\Entity\\{$this->_entityName}";
        return array_map(function ($item) use ($class_name) {
            return new $class_name($item);
        }, $items);
    }
}
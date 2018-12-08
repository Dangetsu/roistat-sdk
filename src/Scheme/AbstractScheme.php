<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use \Analytics\Engine;

abstract class AbstractScheme {
    /** @var string */
    protected $_entityName;
    /** @var Engine\Api */
    protected $_api;

    /**
     * AbstractScheme constructor.
     * @param Engine\Api $api
     */
    public function __construct(Engine\Api $api) {
        $this->_api = $api;
    }

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
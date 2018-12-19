<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

abstract class AbstractScheme {
    const MAX_PAGE_COUNT = 800;

    /** @var string */
    protected $_entityName;
    /** @var Analytics\Roistat */
    protected $_base;

    /**
     * AbstractScheme constructor.
     * @param Analytics\Roistat $base
     */
    public function __construct(Analytics\Roistat $base) {
        $this->_base = $base;
    }

    /**
     * @param string $method
     * @param Engine\Query $query
     * @param string $itemsKey
     * @return array
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    protected function _loadItems($method, Engine\Query $query, $itemsKey) {
        $result = [];
        for ($page = 1; $page <= self::MAX_PAGE_COUNT; $page++) {
            $response = $this->_base->api()->send($method, $query, Engine\Api::METHOD_POST);
            if (!array_key_exists($itemsKey, $response)) {
                throw new Exception\BasicException('Data is not exist in response');
            }

            $responseItems = $response[$itemsKey];
            $result = array_merge($result, $responseItems);
            $query->offset += $query->limit;

            if (count($result) >= $response['total'] || !$query->isLoadAll()) {
                return $result;
            }
        }
        throw new Exception\BasicException('Max count pages limit');
    }

    /**
     * @param array $items
     * @return mixed
     */
    protected function _buildEntity(array $items) {
        $class_name = "Analytics\\Entity\\{$this->_entityName}";
        return array_map(function ($item) use ($class_name) {
            /** @var Entity\AbstractEntity $entity */
            $entity = new $class_name($this);
            $entity->load($item);
            return $entity;
        }, $items);
    }
}
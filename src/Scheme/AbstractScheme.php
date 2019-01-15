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
     * @return string
     */
    abstract protected function _getResponseEntityClass();

    /**
     * @param string $method
     * @param Engine\Query $query
     * @param string $itemsKey
     * @return array
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    protected function _loadItems($method, $query = null, $itemsKey = null) {
        if ($query === null) {
            $query = new Engine\Query();
        }

        $result = [];
        for ($page = 1; $page <= self::MAX_PAGE_COUNT; $page++) {
            $response = $this->_base->api()->send($method, $query, Engine\Api::METHOD_POST);
            if ($itemsKey !== null && !array_key_exists($itemsKey, $response)) {
                throw new Exception\BasicException('Data is not exist in response');
            }

            $responseItems = $itemsKey !== null ? $response[$itemsKey] : $response;
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
     * @param string $className
     * @return mixed
     */
    protected function _buildEntityList(array $items, $className = null) {
        if ($className === null) {
            $className = $this->_getResponseEntityClass();
        }
        return array_map(function ($item) use ($className) {
            return $this->_buildEntity($item, $className);
        }, $items);
    }

    /**
     * @param array $item
     * @param string $className
     * @return mixed
     */
    protected function _buildEntity(array $item, $className = null) {
        if ($className === null) {
            $className = $this->_getResponseEntityClass();
        }
        /** @var Entity\AbstractEntity $entity */
        $entity = new $className($this);
        $entity->load($item);
        return $entity;
    }
}
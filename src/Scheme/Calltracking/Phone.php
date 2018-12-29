<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Calltracking;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity\Calltracking;

class Phone extends Scheme\AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Calltracking\Phone[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/calltracking/phone/list', $query, 'data');
        return $this->_buildEntityList($items);
    }

    /**
     * @param string $prefix
     * @param int $count
     * @return Calltracking\Phone[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function buy($prefix, $count) {
        $response = $this->_base->api()->send('project/calltracking/phone/buy', ['prefix' => $prefix, 'count' => $count], Engine\Api::METHOD_POST);
        return $this->_buildEntityList($response['data']);
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Calltracking\Phone::getClass();
    }
}
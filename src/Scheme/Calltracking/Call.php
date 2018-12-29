<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Calltracking;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity\Calltracking;

class Call extends Scheme\AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Calltracking\Call[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/calltracking/call/list', $query, 'data');
        return $this->_buildEntityList($items);
    }

    /**
     * @param Calltracking\Call $call
     * @return Calltracking\Call
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(Calltracking\Call $call) {
        $response = $this->_base->api()->send('project/phone-call', $call, Engine\Api::METHOD_POST);
        return $call->setId($response['phoneCall']['id']);
    }

    /**
     * @param Calltracking\Call $call
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function update(Calltracking\Call $call) {
        $response = $this->_base->api()->send('project/calltracking/call/update', $call, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Calltracking\Call::getClass();
    }
}
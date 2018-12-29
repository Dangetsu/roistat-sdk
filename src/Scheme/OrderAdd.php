<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class OrderAdd extends AbstractScheme {
    /**
     * @param Entity\OrderAdd[] $orders
     * @return Entity\OrderAdd\Response
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(array $orders) {
        $response = $this->_base->api()->send('project/add-orders', $orders, Engine\Api::METHOD_POST);
        return $this->_buildEntity($response);
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\OrderAdd\Response::getClass();
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class OrderAdd extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'OrderAddResponse';

    /**
     * @param Entity\OrderAdd[] $orders
     * @return Entity\OrderAddResponse
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(array $orders) {
        $response = $this->_api->send('project/add-orders', $orders, Engine\Api::METHOD_POST);
        return new Entity\OrderAddResponse($response);
    }
}
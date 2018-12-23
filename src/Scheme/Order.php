<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Order extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'Order';

    /**
     * @param Engine\Query $query
     * @return Entity\Order[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/integration/order/list', $query, 'data');
        return $this->_buildEntity($items);
    }

    /**
     * @param string $orderId
     * @return string
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function externalUrl($orderId) {
        $response = $this->_base->api()->send("project/orders/{$orderId}/external-url");
        return $response['externalUrl'];
    }

    /**
     * @return array
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function customFields() {
        $response = $this->_base->api()->send('project/analytics/order-custom-fields');
        return $response['fields'];
    }

    /**
     * todo: call from entity
     * @param string $orderId
     * @param string $statusId
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function statusUpdate($orderId, $statusId) {
        $response = $this->_base->api()->send("project/integration/order/{$orderId}/status/update", ['status_id' => $statusId], Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * todo: call from entity
     * @param string $orderId
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function delete($orderId) {
        $response = $this->_base->api()->send("project/integration/order/{$orderId}/delete", [],Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }
}
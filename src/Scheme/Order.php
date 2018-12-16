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
        if ($query === null) {
            $query = new Engine\Query();
        }
        $items = $this->_loadItems('project/integration/order/list', $query, 'data');
        return $this->_buildEntity($items);
    }
}
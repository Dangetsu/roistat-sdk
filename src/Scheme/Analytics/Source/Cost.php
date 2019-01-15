<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Analytics\Source;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Entity\Analytics\Source;

class Cost extends Scheme\AbstractScheme {
    /**
     * @return Source\Cost[]
     */
    public function items() {
        $items = $this->_loadItems('project/analytics/source/cost/list');
        return $this->_buildEntityList($items);
    }

    /**
     * @param Source\Cost $cost
     * @return bool
     */
    public function create(Source\Cost $cost) {
        $response = $this->_base->api()->send('project/analytics/source/cost/add', $cost, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Source\Cost::getClass();
    }
}
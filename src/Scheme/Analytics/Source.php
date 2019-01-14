<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Analytics;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Entity;

class Source extends Scheme\AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Entity\Analytics\Source[]
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/analytics/source/list', $query, 'data');
        return $this->_buildEntityList($items);
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\Analytics\Source::getClass();
    }
}
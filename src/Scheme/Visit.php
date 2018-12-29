<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Visit extends AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Entity\Visit[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/site/visit/list', $query, 'data');
        return $this->_buildEntityList($items);
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\Visit::getClass();
    }
}
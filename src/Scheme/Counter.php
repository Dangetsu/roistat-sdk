<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine\Exception;
use Analytics\Entity;

class Counter extends AbstractScheme {
    /**
     * @return Entity\Counter
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function get() {
        $response = $this->_base->api()->send('project/settings/counter/list');
        $objects = $this->_buildEntityList($response['data']);
        return count($objects) > 0 ? $objects[0] : null;
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\Counter::getClass();
    }
}
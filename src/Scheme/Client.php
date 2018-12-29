<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Client extends AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Entity\Client[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/clients', $query, 'clients');
        return $this->_buildEntityList($items);
    }

    /**
     * @param Entity\Client[] $clients
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(array $clients) {
        $response = $this->_base->api()->send('project/clients/import', $clients, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\Client::getClass();
    }
}
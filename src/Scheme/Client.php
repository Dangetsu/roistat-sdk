<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Client extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'Client';

    /**
     * @param Engine\Query $query
     * @return Entity\Client[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        if ($query === null) {
            $query = new Engine\Query();
        }
        $items = $this->_loadItems('project/clients', $query, 'clients');
        return $this->_buildEntity($items);
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
}
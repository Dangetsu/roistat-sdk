<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Calltracking;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity\Calltracking;

class Script extends Scheme\AbstractScheme {
    /** @var string */
    protected $_entityName = 'Calltracking\\Script';

    /**
     * @param Engine\Query $query
     * @return Calltracking\Script[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/calltracking/script/list', $query, 'data');
        return $this->_buildEntity($items);
    }

    /**
     * @param Calltracking\Script $script
     * @return Calltracking\Script
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(Calltracking\Script $script) {
        $response = $this->_base->api()->send('project/calltracking/script/create', $script, Engine\Api::METHOD_POST);
        return (new Calltracking\Script())->load($response['data']);
    }

    /**
     * @param Calltracking\Script $script
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function update(Calltracking\Script $script) {
        $response = $this->_base->api()->send('project/calltracking/script/update', $script, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function delete($id) {
        $response = $this->_base->api()->send('project/calltracking/script/delete', ['id' => $id], Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }
}
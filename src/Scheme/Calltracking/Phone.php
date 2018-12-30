<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Calltracking;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity\Calltracking;

class Phone extends Scheme\AbstractScheme {
    /**
     * @param Engine\Query $query
     * @return Calltracking\Phone[]
     */
    public function items(Engine\Query $query = null) {
        $items = $this->_loadItems('project/calltracking/phone/list', $query, 'data');
        return $this->_buildEntityList($items);
    }

    /**
     * @param string[] $phones
     * @return Calltracking\Phone[]
     */
    public function create(array $phones) {
        $response = $this->_base->api()->send('project/calltracking/phone/create', ['phones' => $phones], Engine\Api::METHOD_POST);
        return $this->_buildEntityList($response['data']);
    }

    /**
     * @param Calltracking\Phone $phone
     * @return bool
     */
    public function update(Calltracking\Phone $phone) {
        $response = $this->_base->api()->send('project/calltracking/phone/update', $phone, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @param string[] $phones
     * @return bool
     */
    public function delete(array $phones) {
        $response = $this->_base->api()->send('project/calltracking/phone/delete', ['phones' => $phones], Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }

    /**
     * @param string $prefix
     * @param int $count
     * @return Calltracking\Phone[]
     */
    public function buy($prefix, $count) {
        $response = $this->_base->api()->send('project/calltracking/phone/buy', ['prefix' => $prefix, 'count' => $count], Engine\Api::METHOD_POST);
        return $this->_buildEntityList($response['data']);
    }

    /**
     * @return Calltracking\PhoneCode[]
     */
    public function allowedPhoneCodes() {
        $response = $this->_base->api()->send('project/calltracking/phone/prefix/list', [], Engine\Api::METHOD_POST);
        return $this->_buildEntityList($response['data'], Calltracking\PhoneCode::getClass());
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Calltracking\Phone::getClass();
    }
}
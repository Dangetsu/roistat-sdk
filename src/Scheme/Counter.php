<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine\Exception;
use Analytics\Entity;

class Counter extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'Counter';

    /**
     * @return Entity\Counter
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function get() {
        $response = $this->_api->send('project/settings/counter/list');
        return $this->_buildEntity($response['data']);
    }
}
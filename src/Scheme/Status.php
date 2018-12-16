<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Status extends AbstractScheme {
    /**
     * @param Entity\Status[] $statuses
     * @return bool
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function create(array $statuses) {
        $response = $this->_api->send('project/set-statuses', $statuses, Engine\Api::METHOD_POST);
        return $response['status'] === 'success' ? true : false;
    }
}
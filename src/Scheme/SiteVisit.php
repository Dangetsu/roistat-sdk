<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class SiteVisit extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'SiteVisit';

    /**
     * @param Engine\Query $query
     * @return Entity\SiteVisit[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(Engine\Query $query = null) {
        $response = $this->_api->send('project/site/visit/list', $query, 'POST');
        return $this->_buildEntity($response['data']);
    }
}
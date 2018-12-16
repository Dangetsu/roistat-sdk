<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Proxylead extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'Proxylead';

    /**
     * @param \DateTime $periodFrom
     * @param \DateTime $periodTo
     * @return Entity\Proxylead[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(\DateTime $periodFrom, \DateTime $periodTo) {
        $response = $this->_api->send('project/proxy-leads', ['period' => "{$periodFrom->format('Y-m-d')}-{$periodTo->format('Y-m-d')}"]);
        return $this->_buildEntity($response['ProxyLeads']);
    }

    /**
     * @param int $proxyleadId
     * @return Entity\Proxylead
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function get($proxyleadId) {
        $response = $this->_api->send("project/proxy-leads/{$proxyleadId}");
        return new Entity\Proxylead($response['ProxyLead']);
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity;

class Proxylead extends AbstractScheme {
    /**
     * @param \DateTime $periodFrom
     * @param \DateTime $periodTo
     * @return Entity\Proxylead[]
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(\DateTime $periodFrom, \DateTime $periodTo) {
        $response = $this->_base->api()->send('project/proxy-leads', ['period' => "{$periodFrom->format('Y-m-d')}-{$periodTo->format('Y-m-d')}"]);
        return $this->_buildEntityList($response['ProxyLeads']);
    }

    /**
     * @param int $proxyleadId
     * @return Entity\Proxylead
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function get($proxyleadId) {
        $response = $this->_base->api()->send("project/proxy-leads/{$proxyleadId}");
        return $this->_buildEntity($response['ProxyLead']);
    }

    /**
     * @return string
     */
    protected function _getResponseEntityClass() {
        return Entity\Proxylead::getClass();
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme\Calltracking;

use Analytics\Scheme;
use Analytics\Engine;
use Analytics\Engine\Exception;
use Analytics\Entity\Calltracking;

class Data extends Scheme\AbstractScheme {
    /** @var string */
    protected $_entityName = 'Calltracking\\Data';

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return Calltracking\Data
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function items(\DateTime $from, \DateTime $to) {
        $response = $this->_base->api()->send('project/calltracking/data', ['period' => ['from' => $from->format('c'), 'to' => $to->format('c')]], Engine\Api::METHOD_POST);
        return (new Calltracking\Data())->load($response['data']);
    }
}
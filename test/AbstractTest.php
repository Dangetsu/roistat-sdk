<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use GuzzleHttp\Handler;

class AbstractTest extends \PHPUnit_Framework_TestCase {
    /** @var \Analytics\Roistat */
    protected $_roistat;

    protected function setUp() {
        $this->_roistat = new \Analytics\Roistat('f9b21f2e3ecf72b34753caa7a6509e19', 1111);
    }

    protected function tearDown() {
        $this->_roistat = NULL;
    }

    /**
     * @param array $responseData
     * @param int $statusCode
     * @return HandlerStack
     */
    protected function _createMockResponse(array $responseData, $statusCode = 200) {
        $headers = ['Content-Type' => 'application/json'];
        $body = json_encode($responseData);
        $response = new Psr7\Response($statusCode, $headers, $body);
        $mock = new Handler\MockHandler([
            $response
        ]);
        return HandlerStack::create($mock);
    }
}
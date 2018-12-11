<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

require_once '../vendor/autoload.php';

use Analytics\Engine\Exception;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use GuzzleHttp\Handler;

class ProjectTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testGet() {
        $handler = $this->_createMockResponse(['data' => [['id' => '213214', 'code' => 'fuck you']]]);
        $this->_roistat->addMockHandler($handler);
        $counter = $this->_roistat->Counter()->get();
        $this->assertNotNull($counter);
    }

    /**
     * @param array $responseData
     * @param int $statusCode
     * @return HandlerStack
     */
    private function _createMockResponse(array $responseData, $statusCode = 200) {
        $headers = ['Content-Type' => 'application/json'];
        $body = json_encode($responseData);
        $response = new Psr7\Response($statusCode, $headers, $body);
        $mock = new Handler\MockHandler([
            $response
        ]);
        return HandlerStack::create($mock);
    }
}
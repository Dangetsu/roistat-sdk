<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;

class CounterTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testGet() {
        $handler = $this->_createMockResponse(['data' => [['id' => '213214', 'code' => '<script>counter</script>']]]);
        $this->_roistat->addMockHandler($handler);
        $counter = $this->_roistat->Counter()->get();
        $this->assertNotNull($counter);
    }
}
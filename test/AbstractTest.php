<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

class AbstractTest extends \PHPUnit_Framework_TestCase {
    /** @var \Analytics\Roistat */
    protected $_roistat;

    protected function setUp() {
        $this->_roistat = new \Analytics\Roistat('f9b21f2e3ecf72b34753caa7a6509e19', 1111);
    }

    protected function tearDown() {
        $this->_roistat = NULL;
    }
}
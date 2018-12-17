<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics;

use GuzzleHttp;

/**
 * @method Scheme\Project Project()
 * @method Scheme\Counter Counter()
 * @method Scheme\Visit Visit()
 * @method Scheme\Client Client()
 * @method Scheme\Order Order()
 * @method Scheme\OrderAdd OrderAdd()
 * @method Scheme\Status Status()
 * @method Scheme\Proxylead Proxylead()
 * @method Scheme\Calltracking Calltracking()
 */
class Roistat {
    /** @var Engine\Api */
    private $_api;
    /** @var GuzzleHttp\HandlerStack */
    private $_mockHandler;
    /** @var int */
    private $_project_id;
    /** @var string */
    private $_api_key;

    /**
     * Roistat constructor.
     * @param string $api_key
     * @param int $project_id
     */
    public function __construct($api_key, $project_id = null) {
        $this->_api_key = $api_key;
        $this->_project_id = $project_id;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments) {
        $class_name = "Analytics\\Scheme\\{$name}";
        return new $class_name($this->_api());
    }

    /**
     * @param GuzzleHttp\HandlerStack $handler
     */
    public function addMockHandler(GuzzleHttp\HandlerStack $handler) {
        $this->_mockHandler = $handler;
    }

    /**
     * @return Engine\Api
     */
    private function _api() {
        if ($this->_api === null) {
            $this->_api = $this->_api = new Engine\Api($this->_api_key, $this->_project_id, $this->_mockHandler);
        }
        return $this->_api;
    }
}
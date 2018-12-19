<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics;

use GuzzleHttp;

class Roistat {
    /** @var Engine\Api */
    private $_api;
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
     * @return Engine\Api
     */
    public function api() {
        if ($this->_api === null) {
            $this->_api = $this->_api = new Engine\Api($this->_api_key, $this->_project_id);
        }
        return $this->_api;
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics;

/**
 * @method Scheme\Project Project()
 */
class Roistat {
    /** @var Engine\Api */
    private $_api;

    /**
     * Roistat constructor.
     * @param $project_id
     * @param $api_key
     */
    public function __construct($project_id, $api_key) {
        $this->_api = new Engine\Api($project_id, $api_key);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments) {
        $class_name = "Analytics\\Scheme\\{$name}";
        return new $class_name($this->_api);
    }
}
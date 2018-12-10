<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics;

/**
 * @method Scheme\Project Project()
 * @method Scheme\Counter Counter()
 */
class Roistat {
    /** @var Engine\Api */
    private $_api;

    /**
     * Roistat constructor.
     * @param string $api_key
     * @param int $project_id
     */
    public function __construct($api_key, $project_id = null) {
        $this->_api = new Engine\Api($api_key, $project_id);
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
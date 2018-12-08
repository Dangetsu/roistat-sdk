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
    public static $api;

    public function __construct($project_id, $api_key) {
        self::$api = new Engine\Api($project_id, $api_key);
    }

    public function __call($name, $arguments) {
        $class_name = "Analytics\\Scheme\\{$name}";
        return new $class_name($arguments);
    }
}
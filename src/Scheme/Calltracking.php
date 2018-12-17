<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

/** @method Calltracking\Script Script() */
class Calltracking extends AbstractScheme {
    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments) {
        $class_name = "Analytics\\Scheme\\Calltracking\\{$name}";
        return new $class_name($this->_api);
    }
}
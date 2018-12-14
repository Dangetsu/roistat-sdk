<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Engine;

class Query {
    /** @var array */
    public $filters = [];
    /** @var array */
    public $sort;
    /** @var int */
    public $offset;
    /** @var int */
    public $limit;
    /** @var array */
    public $extend;

    /**
     * todo: add high query
     * @param string $field
     * @param string $operate
     * @param mixed $value
     * @return self
     */
    public function addFilter($field, $operate, $value) {
        $this->filters[] = [$field, $operate, $value];
        return $this;
    }

    /**
     * @param string $field
     * @param string $type
     * @return self
     */
    public function setSort($field, $type) {
        $this->sort = [$field, $type];
        return $this;
    }

    /**
     * @param int $offset
     * @return self
     */
    public function setOffset($offset) {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param int $limit
     * @return self
     */
    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param array $extend
     * @return self
     */
    public function setExtend(array $extend) {
        $this->extend = $extend;
        return $this;
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Engine;

use GuzzleHttp;

class Api {
    const API_URL = 'https://cloud.roistat.com/api/v1/';

    /** @var int */
    private $_project_id;
    /** @var string */
    private $_api_key;

    /**
     * Api constructor.
     * @param $project_id
     * @param $api_key
     */
    public function __construct($project_id, $api_key) {
        $this->_project_id = $project_id;
        $this->_api_key = $api_key;
    }

    /**
     * @param string $apiMethod
     * @param object|array $post
     * @param string $method
     * @return string
     */
    public function send($apiMethod, $post = [], $method = 'GET') {
        $client = new GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $url = $this->_buildUrl($apiMethod);
        if ($method === 'POST') {
            $response = $client->post($url, [
                GuzzleHttp\RequestOptions::JSON => $post
            ]);
        } else {
            $response = $client->get($url);
        }
        return $response->getBody()->getContents();
    }

    private function _buildUrl($apiMethod) {
        return self::API_URL . "{$apiMethod}?project_id={$this->_project_id}&key={$this->_api_key}";
    }
}
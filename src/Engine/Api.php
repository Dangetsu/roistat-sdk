<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Engine;

use GuzzleHttp;

class Api {
    const API_URL = 'https://cloud.roistat.com/api/v1/';
    const API_SLEEP_PER_REQUEST = 100000;
    const METHOD_POST = 'POST';
    const METHOD_GET  = 'GET';

    /** @var GuzzleHttp\HandlerStack */
    private $_mockHandler;
    /** @var int */
    private $_project_id;
    /** @var string */
    private $_api_key;

    /**
     * Api constructor.
     * @param string $api_key
     * @param int $project_id
     * @param GuzzleHttp\HandlerStack|null $handler
     */
    public function __construct($api_key, $project_id, $handler = null) {
        $this->_project_id = $project_id;
        $this->_api_key = $api_key;
        $this->_mockHandler = $handler;
    }

    /**
     * @param string $apiMethod
     * @param object|array $post
     * @param string $method
     * @return array
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function send($apiMethod, $post = [], $method = self::METHOD_GET) {
        $client = new GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ],
            'handler' => $this->_mockHandler,
        ]);

        $url = $this->_buildUrl($apiMethod);
        if ($method === self::METHOD_POST) {
            $response = $client->post($url, [
                GuzzleHttp\RequestOptions::JSON => $post
            ]);
        } else {
            $response = $client->get($url);
        }

        $data = GuzzleHttp\json_decode($response->getBody()->getContents(),1 );
        if (array_key_exists('error', $data)) {
            if ($data['error'] === 'authentication_failed') {
                throw new Exception\AuthException($data['error']);
            }
            throw new Exception\BasicException($data['error']);
        }
        usleep(self::API_SLEEP_PER_REQUEST);
        return $data;
    }

    /**
     * @param GuzzleHttp\HandlerStack $handler
     */
    public function addMockHandler(GuzzleHttp\HandlerStack $handler) {
        $this->_mockHandler = $handler;
    }

    /**
     * @param string $apiMethod
     * @return string
     */
    private function _buildUrl($apiMethod) {
        return self::API_URL . "{$apiMethod}?project={$this->_project_id}&key={$this->_api_key}";
    }
}
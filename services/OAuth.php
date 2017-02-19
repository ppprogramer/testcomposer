<?php

namespace Services;


class OAuth
{
    private $code;
    private $appid;
    private $token;
    private $url;
    private $config;
    private $method;

    public function __construct($code, $method)
    {
        $this->code = $code;
        $this->config = require BASE_PATH . '/../config/oauth.php';
        $this->appid = $this->config['appid'];
        $this->token = $this->config['token'];
        $this->method = $method ? $method : 'post';
        $this->url = 'http://open.51094.com/user/auth.html';
    }

    public function getInfo()
    {
        if (!$this->code) {
            throw new \Exception('无效的code码', -1);
        }
        $type = 'get_user_info';
        $params = [
            'type' => $type,
            'code' => $this->code,
            'appid' => $this->appid,
            'token' => $this->token
        ];
        return $this->http($params);
    }

    private function http($params = '', $headers = array())
    {
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        if ($this->method == 'post') {
            curl_setopt($ci, CURLOPT_POST, TRUE);
            if ($params != '') curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
        }
        $headers[] = "User-Agent: 51094PHP(open.51094.com)";
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLOPT_URL, $this->url);
        $response = curl_exec($ci);
        curl_close($ci);
        $json_r = array();
        if (!empty($response)) $json_r = json_decode($response, true);
        return $json_r;
    }
}
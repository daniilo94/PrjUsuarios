<?php
/**
 * User: danilo.silva
 * Date: 15/08/2017
 * Time: 14:39
 */

namespace Model;


class Request {
    private $method;
    private $protocol;
    private $host;
    private $path;
    private $queryString;
    private $body;

    function __construct($method, $protocol, $host, $path = null, $queryString = null, $body = null) {
        $this->method = $method;
        $this->protocol = $protocol;
        $this->host = $host;
        $this->path = $path;
        $this->queryString = $queryString;
        $this->body = $body;
    }


    public function getMethod(){
        return $this->method;
    }


    public function getProtocol(){
        return $this->protocol;
    }


    public function getHost(){
        return $this->host;
    }


    public function getPath(){
        return $this->path;
    }


    public function getQueryString(){
        return $this->queryString;
    }


    public function getBody(){
        return $this->body;
    }


}
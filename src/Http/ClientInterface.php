<?php declare(strict_types=1);

namespace Roul\Purl\Http;

use Roul\Purl\Http\Response\ResponseInterface;

/**
 * [This is the Interface that defines the structure Of the Client Class]
 */
interface ClientInterface 
{
    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A HTTP Request To The Given URL
     */
    public function request(string $method, string $url,array $header = [] , array $options = [])  : ResponseInterface;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A GET Request To The Given URL
     */
    public function get(string $url,array $header = [] , array $options = []) : ResponseInterface;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A POST Request To The Given URL
     */
    public function post(string $url,array $header = [] , array $options = []) : ResponseInterface ;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A PUT Request To The Given URL
     */
    public function put(string $url,array $header = [] , array $options = []) : ResponseInterface;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A DELETE Request To The Given URL
     */
    public function delete(string $url,array $header = [] , array $options = [])  : ResponseInterface;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * 
     * Sends A PATCH Request To The Given URL
     */
    public function patch(string $url,array $header = [] , array $options = [])  : ResponseInterface;

    /**
     * @param string $url
     * @param array $options
     * 
     * @return 
     * Sends An OPTIONS Request To The Given URL
     */
    public function options(string $url,array $header = [] , array $options = [])  : ResponseInterface;

}
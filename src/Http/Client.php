<?php declare(strict_types=1);

namespace Roul\Purl\Http;
use Roul\Purl\Http\Response\Response;
use Roul\Purl\Http\Response\ResponseInterface;
use Roul\Purl\Http\Traits\CurlTrait;

/**
 * [Client Class]
 */
class Client implements ClientInterface
{

    use CurlTrait;

    public function request(string $method, string $url,array $header = [] , array $options = []): ResponseInterface
    {
       
        $response = match ($method) {
            "get" => $this->curlGet($url,$header,$options),
            "post"=> $this->curlPost($url,$header,$options),
            "put"=> $this->curlPut($url,$header,$options),
            "patch"=> $this->curlPatch($url,$header,$options),
            "delete"=> $this->curlDelete($url,$header,$options),
            "options"=> $this->curlOptions($url,$header,$options)
        };

        return new Response($response);

    }
    public function get(string $url,array $header = [] , array $options = [])  : ResponseInterface
    {
        return $this->request("get",  $url, $header,$options);
    }
    public function post(string $url,array $header = [] , array $options = []) : ResponseInterface
    {
        return $this->request("post", $url, $header,$options);
    }
    public function put(string $url,array $header = [] , array $options = []) : ResponseInterface
    {
        return $this->request("put",  $url, $header,$options);
    }
    public function delete(string $url,array $header = [] , array $options = []) : ResponseInterface
    {
        return $this->request("delete",  $url, $header,$options);
    }
    public function options(string $url,array $header = [] , array $options = []) : ResponseInterface
    {
        return $this->request("options", $url, $header,$options);
    }
    public function patch(string $url,array $header = [] , array $options = []) : ResponseInterface
    {
        return $this->request("patch",  $url, $header,$options);
    }
}
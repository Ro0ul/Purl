<?php declare(strict_types=1);

namespace Roul\Purl\Http\Traits;

trait CurlTrait {
    protected function curlGet(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "get",
            $header,
            $options
        );
    }
    protected function curlPost(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "post",
            $header,
            $options
        );
    }

    protected function curlOptions(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "options",
            $header,
            $options
        );
    }
    protected function curlPut(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "put",
            $header,
            $options
        );
    }
    protected function curlPatch(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "patch",
            $header,
            $options
        );
    }
    protected function curlDelete(
        string $url,
        array $header = [],
        array $options = []
    ) : mixed
    {
        return $this->curl($url,
            "delete",
            $header,
            $options
        );
    }
    protected function curl(
        string $url,
        string $method = "get",
        array $header = [],
        array $options = []
    ) : mixed
    {
        $ch = curl_init();        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HEADER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $options["timeout"] ?? 120);
        curl_setopt($ch, CURLOPT_USERAGENT, $options["user-agent"] ?? null);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header ?? 0);
        if(array_key_exists("proxy",$options)){
            curl_setopt($ch, CURLOPT_PROXY, $options["proxy"],);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $options["proxy-username"].":".$options["proxy-password"]);
            curl_setopt($ch, CURLOPT_PROXYPORT, $options["proxy-port"]);
            curl_setopt($ch, CURLOPT_PROXYTYPE, $options["proxy-type"]);
            curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_NTLM);
        }

        match ($method) {
            "get" => null,
            "post"=> curl_setopt($ch,CURLOPT_POST,1) && curl_setopt($ch,CURLOPT_POSTFIELDS,$options["request-body"]),
            "put"=>curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT") && curl_setopt($ch,CURLOPT_POSTFIELDS,$options["request-body"]),
            "patch"=>curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PATCH") && curl_setopt($ch,CURLOPT_POSTFIELDS,$options["request-body"]),
            "delete"=>curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE") && curl_setopt($ch,CURLOPT_POSTFIELDS,$options["request-body"]),
        };
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
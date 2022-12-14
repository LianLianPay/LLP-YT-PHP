<?php

namespace llianpay\yt\client;

use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class LLianPayClient
{
    public static function sendRequest($url, $content): StreamInterface
    {
        if (empty($url)) {
            Logger()->error("[发送请求中]：请求URL非法，请核实！");
        }
        if (empty($content)) {
            Logger()->error("[发送请求中]：请求参数非法，请核实！");
        }

        Logger()->info("[发送请求中]：请求URL为：" . $url);
        Logger()->info("[发送请求中]：请求参数为：: " . $content);

        $client = new Client();
        // 拼接请求头
        $header = [
            'timestamp' => date("YmdHis"),
            'Content-Type' => 'application/json;charset=UTF-8',
        ];
        // 发送请求
        $response = $client->post($url,
            [
                'body' => $content,
                'headers' => $header,
                'verify' => false
            ]);
        
        Logger()->info("[请求完成]：响应结果为：" . $response->getBody());

        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                if ($name == 'Signature-Data') {
                    Logger()->info("[请求完成]：响应签名为：" . $value);
                    // 验签
                    $isValid = LLianPayYtSignature::checkSign($response->getBody(), $value);
                    if ($isValid == 1) {
                        Logger()->info("[请求完成]：验签结果为：正确");
                    } else {
                        Logger()->info("[请求完成]：验签结果为：错误");
                    }
                }
            }
        }
        return $response->getBody();
    }
}
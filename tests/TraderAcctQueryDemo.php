<?php

use llianpay\yt\client\LLianPayClient;
use llianpay\yt\security\LLianPayYtSignature;
use llianpay\yt\params\TraderAcctQueryParams;

require '../vendor/autoload.php';
require '../src/cfg.php';
require '../src/client/LLianPayClient.php';
require '../src/security/LLianPayYtSignature.php';
require '../src/params/TraderAcctQueryParams.php';

// 测试“账户余额查询”接口https://open.lianlianpay.com/apis/account-balance-query.html
function test_traderAcctQuery()
{
    // 构建请求参数
    $params = new TraderAcctQueryParams();
    $params->oid_partner = OID_PARTNER;
    $params->sign_type = 'RSA';
    $params->api_version = '1.0';
    // 生成签名
    $sign_str = LLianPayYtSignature::sign(json_encode($params));
    $params->sign = $sign_str;

    // 账户余额查询接口URL
    $url = 'https://traderapi.lianlianpay.com/traderAcctQuery.htm';
    $result = LLianPayClient::sendRequest($url, json_encode($params));
    echo $result;
}

test_traderAcctQuery();
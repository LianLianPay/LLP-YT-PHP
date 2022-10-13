<?php

use llianpay\yt\security\LLianPayYtSignature;

require '../vendor/autoload.php';
require '../src/cfg.php';
require '../src/security/LLianPayYtSignature.php';

function test_sign()
{
    //构造要请求的参数数组，无需改动
    $data = '{"oid_partner":"201408071000001539","api_version":"1.0","sign_type":"RSA"}';
    $result = LLianPayYtSignature::sign($data);
    echo '待签名串: ' . LLianPayYtSignature::generateSignedStr($data) . '<br/>';
    echo '签名值: ' . $result . '<br/>';
}

function test_checkSign()
{
    $data = '{"ret_code":"8888","ret_msg":"短信已下发，需验证短信验证码","sign_type":"RSA","sign":"Oz+vjL3b4CwKyaVGIO1cn924BYM8LqeX5tZ7U+ZVOmEP2MTgBAnd7FzAV6bxkv0KIxn63/rVMevXAJbeJl2EogV5mF4NaP+kD6kVUGUW7TDQHjokrlLoUrMrZSw3BT6rj0My30Tn+cy8zq5WXuYcVqpGGv0ZZACt11ZrJaSYHX4=","oid_partner":"201408071000001539","no_order":"LLianPay-YT-20221013145018","dt_order":"20221013145018","token":"ce40a0c2e72964cc25e1dcd4e47e62c1","user_id":"LLianPay-YT-Test-12345"}';
    $signature = 'Oz+vjL3b4CwKyaVGIO1cn924BYM8LqeX5tZ7U+ZVOmEP2MTgBAnd7FzAV6bxkv0KIxn63/rVMevXAJbeJl2EogV5mF4NaP+kD6kVUGUW7TDQHjokrlLoUrMrZSw3BT6rj0My30Tn+cy8zq5WXuYcVqpGGv0ZZACt11ZrJaSYHX4=';
    
    $result = LLianPayYtSignature::checkSign($data, $signature);
    if ($result == 1) {
        echo '验签结果: 正确！';
    } else {
        echo '验签结果：错误！';
    }
}

test_sign();
//test_checkSign();

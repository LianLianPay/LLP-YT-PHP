<?php

use llianpay\yt\client\LLianPayClient;
use llianpay\yt\security\LLianPayYtSignature;
use llianpay\yt\encrypt\LLianPayEncrypt;
use llianpay\yt\params\BankCardBindParams;
use llianpay\yt\params\YtRequest;

require '../vendor/autoload.php';
require '../src/cfg.php';
require '../src/client/LLianPayClient.php';
require '../src/security/LLianPayYtSignature.php';
require '../src/security/LLianPayEncrypt.php';
require '../src/params/BankCardBindParams.php';
require '../src/params/YtRequest.php';

// 测试“银行卡签约申请”接口https://open.lianlianpay.com/apis/bankCard-signing.html
function test_bankCardBindParams()
{
    $timestamp = date("YmdHis");
    // 构建请求参数
    $params = new BankCardBindParams();
    $params->user_id = 'LLianPay-YT-Test-12345';
    $params->oid_partner = OID_PARTNER;
    $params->sign_type = 'RSA';
    $params->notify_url = 'https://test.lianlianpay/notify';
    $params->no_order = 'LLianPay-YT-' . $timestamp;
    $params->dt_order = $timestamp;
    /*
    支付方式。 指定使用的支付方式。
    2， 快捷支付 - 借记卡。
    3， 快捷支付 - 信用卡。
    P， 新认证支付。
    27， 运通卡支付（信用卡）。
    */
    $params->pay_type = '2';
    // 用户银行卡卡号
    $params->card_no = '';
    // 用户姓名，为用户在银行预留的姓名信息
    $params->acct_name = '';
    // 用户在银行预留的手机号码
    $params->bind_mob = '';
    /*
    证件类型。
    0， 身份证或企业经营证件。
    1， 户口簿。
    2， 护照。
    3， 军官证。
    4， 士兵证。
    5， 港澳居民来往内地通行证。
    6，台湾同胞来往内地通行证。
    7， 临时身份证
    8，外国人居住证。
    9，警官证。
    10，组织机构代码
    X， 其他证件。
    目前仅支持身份证，不传则默认为身份证。
    */    
    $params->id_type = '0';
    // 证件号码
    $params->id_no = '';

    // 生成签名
    $sign_str = LLianPayYtSignature::sign(json_encode($params));
    $params->sign = $sign_str;

    $request = new YtRequest();
    $request->oid_partner = OID_PARTNER;
    $request->pay_load = LLianPayEncrypt::encryptGeneratePayload(json_encode($params));

    // 银行卡签约申请URL
    $url = 'https://mpayapi.lianlianpay.com/v1/bankcardbind';
    $result = LLianPayClient::sendRequest($url, json_encode($request));
    echo $result;
}

test_bankCardBindParams();
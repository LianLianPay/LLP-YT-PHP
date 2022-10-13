<?php

namespace llianpay\yt\params;

class BankCardBindParams
{
    // 平台来源标识
    public string $platform;
    public string $user_id;
    public string $oid_partner;
    public string $sign_type;
    public string $sign;
    public string $notify_url;
    public string $no_order;
    public string $dt_order;
    /*
    支付方式。 指定使用的支付方式。
    2， 快捷支付 - 借记卡。
    3， 快捷支付 - 信用卡。
    P， 新认证支付。
    27， 运通卡支付（信用卡）。
     */    
    public string $pay_type;
    public string $risk_item;
    public string $card_no;
    public string $acct_name;
    public string $bind_mob;
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
    public string $id_type;
    public string $id_no;
}
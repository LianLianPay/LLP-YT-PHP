<?php

namespace llianpay\yt\params;

class TraderAcctQueryParams
{
    // 商户号，ACCP系统分配给平台商户的唯一编号
    public string $oid_partner;
    public string $api_version;
    public string $sign;
    public string $sign_type;
}
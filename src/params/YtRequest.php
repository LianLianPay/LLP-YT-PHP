<?php

namespace llianpay\yt\params;

class YtRequest
{
    // 商户号，ACCP系统分配给平台商户的唯一编号
    public string $oid_partner;
    public string $pay_load;
}
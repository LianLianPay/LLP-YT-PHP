# LLP-YT-PHP

欢迎来到连连银通产品开放平台API接口的PHP示例代码仓库， 本仓库包含示例代码及必要的说明。

## 主要内容：

本仓库中所有Demo均请求连连正式环境，Demo仅做参考，建议只参考签名方法，请仔细阅读Demo代码，如有问题及时群内连连技术技术。

### 前置要求：
当前使用的php-7.4.30

### 使用说明
1、keys/llianpay_public_key.pem为连连的公钥，测试环境和正式环境均为这个，不用替换。<br/>
2、keys/merchant_private_key.pem为连连正式环境的测试商户号的私钥，如使用贵司正式商户号，此私钥要替换成商户正式的私钥。<br/>
3、src/security/LLianPayYtSignature.php 包含签名、验签。<br/>
4、src/client/LLianPayClient.php 包含发起请求方法。<br/>

### Demo说明（持续完善中）
#### 银行卡签约：
* 银行卡签约申请：BankCardBindDemo.php https://open.lianlianpay.com/apis/bankCard-signing.html
#### 通用：
* 账户余额查询：TraderAcctQueryDemo.php https://open.lianlianpay.com/apis/account-balance-query.html

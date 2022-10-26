<?php
declare(strict_types=1);

namespace Easydingtalk\util\encrypt;

use Exception;

class DingCallbackCrypto
{
    /**
     * @param token          钉钉开放平台上，开发者设置的token
     * @param encodingAesKey 钉钉开放台上，开发者设置的EncodingAESKey
     * @param corpId         企业自建应用-事件订阅, 使用appKey
     *                       企业自建应用-注册回调地址, 使用corpId
     *                       第三方企业应用, 使用suiteKey
     */
    private $m_token;
    private $m_encodingAesKey;
    private $m_corpId;
    //注意这里修改为构造函数
    function __construct($token, $encodingAesKey, $ownerKey)
    {
        $this->m_token = $token;
        $this->m_encodingAesKey = $encodingAesKey;
        $this->m_corpId = $ownerKey;
	}
	
	public function getEncryptedMap($plain){
		$timeStamp = time();
		$pc = new Prpcrypt($this->m_encodingAesKey);
		$nonce= $pc->getRandomStr();
		return $this->getEncryptedMapDetail($plain, $timeStamp, $nonce);
	}

	/**
	 * 加密回调信息
	 */
    public function getEncryptedMapDetail($plain, $timeStamp, $nonce)
    {
        $pc = new Prpcrypt($this->m_encodingAesKey);

        $array = $pc->encrypt($plain, $this->m_corpId);
        $ret = $array[0];
        if ($ret != 0) {
            //return $ret;
			// return ['ErrorCode'=>$ret, 'data' => ''];
			throw new Exception('AES加密错误',ErrorCode::$EncryptAESError);
        }

        if ($timeStamp == null) {
            $timeStamp = time();
        }
        $encrypt = $array[1];

        $sha1 = new SHA1;
        $array = $sha1->getSHA1($this->m_token, $timeStamp, $nonce, $encrypt);
        $ret = $array[0];
        if ($ret != 0) {
            //return $ret;
            throw new Exception('ComputeSignatureError',ErrorCode::$ComputeSignatureError);
        }
        $signature = $array[1];

        return json_encode(array(
            "msg_signature" => $signature,
            "encrypt" => $encrypt,
            "timeStamp" => $timeStamp,
            "nonce" => $nonce
        ));
        
		
    }

	/**
	 * 解密回调信息
	 */
    public function getDecryptMsg($signature, $timeStamp, $nonce, $encrypt)
    {
        if (strlen($this->m_encodingAesKey) != 43) {
            //return ErrorCode::$IllegalAesKey;
			// return ['ErrorCode'=>ErrorCode::$IllegalAesKey, 'data' => ''];
			throw new Exception('IllegalAesKey',ErrorCode::$IllegalAesKey);
        }

        $pc = (new Prpcrypt($this->m_encodingAesKey));

      

        $sha1 = (new SHA1());
        $array = $sha1->getSHA1($this->m_token, $timeStamp, $nonce, $encrypt);
        $ret = $array[0];

        if ($ret != 0) {
            //return $ret;
			// return ['ErrorCode'=>$ret, 'data' => ''];
			throw new Exception('ComputeSignatureError',ErrorCode::$ComputeSignatureError);
        }

        $verifySignature = $array[1];
        if ($verifySignature != $signature) {
            //return ErrorCode::$ValidateSignatureError;
			//return ['ErrorCode'=>ErrorCode::$ValidateSignatureError, 'data' => ''];
			throw new Exception('ValidateSignatureError',ErrorCode::$ValidateSignatureError);
        }
       
        $result = $pc->decrypt($encrypt, $this->m_corpId);
      
        if ($result[0] != 0) {
            //return $result[0];
			// return ['ErrorCode'=>$result[0], 'data' => ''];
			throw new Exception('DecryptAESError',ErrorCode::$DecryptAESError);
        }
        $decryptMsg = $result[1];
        //return ErrorCode::$OK;
        return $decryptMsg;

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: tomasz.gramza
 * Date: 19/08/15
 * Time: 11:51
 */

namespace Tests\Libs;

class Device {
    private $deviceId;
    private $oauthValidationToken;
    public function __construct($deviceId)
    {
        $this->deviceId = $deviceId;
    }
    /**
     * @return mixed
     */
    public function getOauthValidationToken()
    {
        if ($this->oauthValidationToken === null)
        {
            $this->oauthValidationToken = self::generateOauthValidationToken($this->deviceId);
        }
        return $this->oauthValidationToken;
    }
    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }
    public static function random()
    {
        return new Device(time() . '_' . md5(rand()));
    }
    /**
     * The algorithm comes from Atlas and is shared with
     * If your test fails, it is good idea to verify this method.
     *
     * @param string $deviceId
     * @return string
     */
    private static function generateOauthValidationToken($deviceId)
    {
        $data = json_encode([
            'id' => $deviceId,
        ]);
        $payloadBody = self::urlSafeB64Encode($data);
        $token = hash_hmac("sha1", $payloadBody, 'device', false);
        return $payloadBody . '.' . $token;
    }
    
    private static function urlSafeB64Encode($data)
    {
        $data = base64_encode($data);
        return str_replace(
            array('+', '/'),
            array('-', '_'),
            $data
        );
    }
}
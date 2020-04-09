<?php

namespace Bhavinjr\Alots;

use GuzzleHttp\Client;

class Api
{
    protected $baseUrl 	= 'http://www.alots.in/sms-panel/api/http/index.php';

    protected $alots 	= null;

    protected $username = null;

    protected $key 		= null;

    protected $sender   = null;

    const API_REQUEST_TEXT      = 'Text';

    const API_REQUEST_UNICODE   = 'Unicode';

    const API_REQUEST_SCHEDULE  = 'Schedule';

    const API_REQUEST_GROUP     = 'Group';

    const API_REQUEST_DELIVERY  = 'DeliveryReport';

    const API_REQUEST_CREDIT    = 'CreditCheck';

    /**
     * @param string $username
     * @param string $key
     * @param string $sender
     */
    public function __construct($username, $key, $sender)
    {
        $this->username = 	$username;
        $this->key 		= 	$key;
        $this->sender   =   $sender;
        $this->alots  	= 	$this->setClient();
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getAuthorizeData()
    {
        return [
            'username' 	=> 	$this->username,
            'apikey' 	=> 	$this->key,
            'sender' 	=> 	$this->sender,
            'format'	=>	config('alots.format'),
            'route'     =>  config('alots.route')
        ];
    }

    protected function setClient()
    {
        return new Client([
            'base_uri' => $this->getBaseUrl(),
        ]);
    }

    public function getFullUrl()
    {
        return $this->getBaseUrl();
    }
}

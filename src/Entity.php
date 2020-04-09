<?php

namespace Bhavinjr\Alots;

use Bhavinjr\Alots\Models\AlotsMessage;

class Entity extends Api
{
    const RESPONSE_ERROR = 'error';

    const RESPONSE_SUCCESS = 'success';

    protected $mobile_numbers = null;

    protected $api_request = null;

    protected function sendSms($method, $data)
    {
        $this->mobile_numbers = $data['mobile'] ?? null;
        $this->api_request 	  = $data['apirequest'];

        $payload 	= array_merge($this->getAuthorizeData(), $data);
        $payloadUri = $this->getFullUrl().'?'.http_build_query($payload);
        return $this->request($method, $payloadUri);
    }

    /**
     * Makes a HTTP request using Request class and assuming the API returns
     * formatted entity or collection result, wraps the returned JSON as entity
     * and returns.
     *
     * @param string $method
     * @param string $relativeUrl
     * @param array  $data
     *
     * @return Entity
     */
    private function request($method, $relativeUrl, $data = [])
    {
        $response = $this->alots->request($method, $relativeUrl, $data);

        $response = json_decode($response->getBody()->getContents());

        if (isset($response->status)) {
            if ($response->status == self::RESPONSE_ERROR) {
                throw new Errors\BadRequestError($response->message, 500);
            }
            if ($response->status == self::RESPONSE_SUCCESS && ($this->api_request == self::API_REQUEST_TEXT || $this->api_request == self::API_REQUEST_UNICODE)) {
                $this->fill($response);
            }
        }

        return $response;
    }

    private function fill($response)
    {
        $mobile_numbers = explode(',', $this->mobile_numbers);

        foreach ($mobile_numbers as $key => $mobile_number) {
            AlotsMessage::create(['mobile_number' => $mobile_number,
                        'message_id' => $response->{'message-id'}[$key] ?? null,
                        'message'   => $response->message,
                        'status'    => $response->status,
                    ]);
        }
    }
}

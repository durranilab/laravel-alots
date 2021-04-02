<?php

namespace Bhavinjr\Alots;

use Bhavinjr\Alots\Errors;

class Alots extends Entity
{
    public function simpleSms($receiver, $message_text, $template_id = null)
    {
        try {
            $payload = [
                'apirequest' => self::API_REQUEST_TEXT,
                'mobile' 	=> 	$receiver,
                'message' 	=> 	$message_text,
                'TemplateID' => $template_id ?? config('alots.template_id')
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }

    public function unicodeSms($receiver, $message_text, $template_id = null)
    {
        try {
            $payload = [
                'apirequest' => self::API_REQUEST_UNICODE,
                'mobile' 	=> 	$receiver,
                'message' 	=> 	$message_text,
                'TemplateID' => $template_id ?? config('alots.template_id')
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }

    public function scheduleSms($receiver, $message_text, $datetime, $template_id = null)
    {
        try {
            $payload = [
                'apirequest'    =>  self::API_REQUEST_SCHEDULE,
                'mobile'        => 	$receiver,
                'message'       => 	$message_text,
                'datetime'      =>	$datetime,
                'TemplateID'    =>  $template_id ?? config('alots.template_id')
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }

    public function groupSms($group_id, $message_text, $template_id = null)
    {
        try {
            $payload = [
                'apirequest'    =>  self::API_REQUEST_GROUP,
                'message'       => 	$message_text,
                'groupid'       =>	$group_id,
                'TemplateID'    =>  $template_id ?? config('alots.template_id')
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }

    public function getDeliveryReport($message_id)
    {
        try {
            $payload = [
                'apirequest' 	=> self::API_REQUEST_DELIVERY,
                'messageid' 	=> $message_id
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }

    public function checkCredit()
    {
        try {
            $payload = [
                'apirequest' 	=> self::API_REQUEST_CREDIT
            ];

            return $this->sendSms('GET', $payload);
        } catch (Errors\BadRequestError $ex) {
            return response()->json(
                ['error' => $ex->getMessage()],
                $ex->getHttpStatusCode()
            );
        }
    }
}

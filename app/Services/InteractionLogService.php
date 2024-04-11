<?php

namespace App\Services;

use App\Models\InteractionLog;

class InteractionLogService
{
    public function logInteraction($userId, $service, $requestBody, $responseCode, $responseBody, $sourceIp)
    {
        InteractionLog::create([
            'user_id' => $userId,
            'service' => $service,
            'request_body' => $requestBody,
            'response_code' => $responseCode,
            'response_body' => $responseBody,
            'source_ip' => $sourceIp,
        ]);
    }
}

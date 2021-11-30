<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Success response method.
     *
     * @param mixed $result
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, string $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * Return error response.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return return type
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessage)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}

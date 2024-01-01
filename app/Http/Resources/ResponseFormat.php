<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResponseFormat
{

    public static function format($code, $data = null, $customMessage = null)
    {
        $responseType = array(
            'Success' => 200,
            'Not Found' => 404,
            'Unauthorized' => 401 
        );

        $responseTypeSelected = array_search($code , $responseType);

        return response()->json(array(
            'message' => !$customMessage ? $responseTypeSelected : $customMessage,
            'code' => $code,
            'data' => $data
        ));
    }



}

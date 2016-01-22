<?php

namespace App\API\Strings\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Override FormRequest's response() method to return our own response for validation errors.
     *
     * @param array $errors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(array $errors)
    {
        $payload = ['errors' => []];

        foreach ($errors as $field => $message) {
            $payload['errors'][] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }

        return response()->json($payload, 422);
    }

    /**
     * Override FormRequests's forbiddenResponse() method to return our own response when a user is forbidden.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbiddenResponse()
    {
        return response()->error(trans('errors.authentication.forbidden'), 403);
    }
}
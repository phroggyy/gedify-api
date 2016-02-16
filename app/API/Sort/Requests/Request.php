<?php

namespace App\API\Sort\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request
 * @package App\API\Sort\Requests
 */
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
        $payload = ['input' => Request::get('input'), 'errors' => []];

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
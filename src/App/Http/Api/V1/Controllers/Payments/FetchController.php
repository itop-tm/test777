<?php

namespace App\Http\Api\V1\Controllers\Payments;

use App\Http\Api\V1\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FetchController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = currentClient();

        $payment = $client->payment()->where('ref_uuid', $request->ref_uuid)->first();

        error_if(!$payment, 'MODEL_NOT_FOUND');

        return response([
            'success' => true,
            'data'    => $payment
        ]);
    }
}
/**
* @OA\Get(
*   path="/client/payment/{ref_uuid}",
*   tags={"Payments"},
*   security={
*      {"bearer_token": {}},
*   },
*   summary="Fetch a payment by ref_uuid",
*   @OA\Parameter(
*     name="ref_uuid",
*     in="query",
*     description="ref_uuid of the payment",
*     required=true,
*     @OA\Schema(
*      type="integer",
*     )
*   ),
*   @OA\Response(
*     response="404",
*     description="MODEL_NOT_FOUND",
*     @OA\JsonContent(ref="#components/schemas/ErrorResponse")
*   ),
*   @OA\Response(
*      response="200",
*      description="ok",
*      @OA\JsonContent(
*         @OA\Property(
*            property="data",
*            ref="#/components/schemas/PaymentModel"
*         )
*       )
*   ),
* )
*/

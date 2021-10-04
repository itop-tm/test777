<?php

namespace App\Http\Api\V1\Controllers\Payments\Telecom;

use App\Http\Api\V1\Controllers\Controller;
use App\Http\Api\V1\Requests\Telecom\CreateRequest as Request;
use Domain\Payments\Actions\Telecom\CreateTelecomPaymentAction as Action;
use Illuminate\Http\Response;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = currentClient();

        app(Action::class)->execute($client, $request->all());

        return response([
            'success'  => true
        ], Response::HTTP_OK);
    }
}
/**
* @OA\Post(
*   path="/payments/telecom",
*   tags={"TELECOM"},
*   security={
*      {"bearer_token": {}},
*   },
*   summary="Create a new telecom payment",
*   @OA\RequestBody(
*     required=true,
*     @OA\JsonContent(ref="#components/schemas/TelecomPaymentCreateRequest")
*   ),
*   @OA\Response(
*     response="406",
*     description="Validation error",
*     @OA\JsonContent(ref="#components/schemas/ErrorResponse")
*   ),
*   @OA\Response(
*     response="200",
*     description="result",
*     @OA\JsonContent(
*         @OA\Property(
*            property="success",
*            title="status",
*            type="boolean",
*            description="result status"
*         ),
*         @OA\Property(
*            property="data",
*            title="data",
*            type="array",
*            description="Created payment data",
*            @OA\Items(ref="#/components/schemas/PaymentModel")
*         ),
*     ),
*   ),
* )
*/

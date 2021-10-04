<?php

namespace App\Http\Api\V1\Controllers\Payments\Tmcell;

use App\Http\Api\V1\Controllers\Controller;
use App\Http\Api\V1\Requests\Tmcell\CreateRequest as Request;
use Domain\Payments\Actions\Tmcell\CreateTmcellPaymentAction as Action;
use Illuminate\Http\Response;

final class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = currentClient();

        $payment = app(Action::class)->execute($client, $request->all());

        return response([
            'success'  => true,
            'data'     => $payment
        ], Response::HTTP_OK);
    }
}
/**
* @OA\Post(
*   path="/payments/tmcell",
*   tags={"TMCELL"},
*   security={
*      {"bearer_token": {}},
*   },
*   summary="Create a new tmcel payment",
*   @OA\RequestBody(
*     required=true,
*     @OA\JsonContent(ref="#components/schemas/TmcellPaymentCreateRequest")
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

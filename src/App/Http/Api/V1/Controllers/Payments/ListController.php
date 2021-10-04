<?php

namespace App\Http\Api\V1\Controllers\Payments;

use App\Http\Api\V1\Controllers\Controller;
use App\Http\Api\V1\Resources\PaginatorCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = currentClient();

        $payments = $client->payment()->paginate();

        return PaginatorCollection::collection($payments);
    }
}
/**
 * @OA\Get(
 *     path="client/payments",
 *     operationId="PaymentsList",
 *     tags={"Payments"},
 *     summary="Display a listing of payments",
 *     security={
 *       {"bearer_token": {}},
 *     },
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="The page number",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="List of payments created by client",
 *         @OA\JsonContent(
 *           @OA\Property(
 *              property="data",
 *              title="Data",
 *              type="array",
 *              description="list of entity",
 *              @OA\Items(ref="#/components/schemas/PaymentModel")
 *           ),
 *           @OA\Property(
 *             property="meta",
 *             ref="#/components/schemas/PaginatorMeta"
 *           ),
 *           @OA\Property(
 *             property="links",
 *             ref="#/components/schemas/PaginatorLinks"
 *           )
 *         )
 *     ),
 * )
*/

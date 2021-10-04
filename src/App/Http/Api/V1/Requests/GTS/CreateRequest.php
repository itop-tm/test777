<?php

namespace App\Http\Api\V1\Requests\GTS;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'money_amount'     => 'required|numeric|min:1|max:100000',
            'agreement_number' => 'required|numeric',
            'type'             => 'required|min:2|max:5',
            'payment_type'     => 'nullable|min:2|max:5'
        ];
    }
}
/**
 * @OA\Schema(
 *     schema="GTSPaymentCreateRequest",
 *     type="object",
 *     title="GTSPaymentCreateRequest",
 *     description="create gts payment request body data",
 *     required={"money_amount", "agreement_number", "type"},
 *     @OA\Property(
 *         property="money_amount",
 *         title="money_amount",
 *         type="integer",
 *         description="Amount of money, 120 is 1.20 manat",
 *         example="100"
 *     ),
 *     @OA\Property(
 *         property="agreement_number",
 *         title="agreement_number",
 *         type="integer",
 *         format="int64",
 *         description="Get agreement_number from get balance request",
 *         example="323222"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         title="type",
 *         type="string",
 *         description="Type of gts service",
 *         enum={"phone", "inet", "iptv"},
 *         example="inet"
 *     ),
 *     @OA\Property(
 *       property="method",
 *       ref="#/components/schemas/PaymentMethod"
 *     ),
 *  )
 */

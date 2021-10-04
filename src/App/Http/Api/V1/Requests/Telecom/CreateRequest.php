<?php

namespace App\Http\Api\V1\Requests\Telecom;

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
            'money_amount'  => 'required|numeric',
            'account'       => 'required|numeric|digits:6'
        ];
    }
}
/**
 * @OA\Schema(
 *     schema="TelecomPaymentCreateRequest",
 *     type="object",
 *     title="TelecomPaymentCreateRequest",
 *     description="create telecom payment request body data",
 *     required={"money_amount", "account"},
 *     @OA\Property(
 *         property="money_amount",
 *         title="money_amount",
 *         type="integer",
 *         description="Amount of money, 120 is 1.20 manat",
 *         example="100"
 *     ),
 *     @OA\Property(
 *         property="account",
 *         title="account",
 *         type="integer",
 *         format="int64",
 *         description="Destination account number",
 *         example="461699"
 *     ),
 *     @OA\Property(
 *       property="method",
 *       ref="#/components/schemas/PaymentMethod"
 *     ),
 *  )
 */

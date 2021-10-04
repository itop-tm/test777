<?php

namespace Domain\Payments\Enums;

use MyCLabs\Enum\Enum;

/**
 *  @OA\Schema(
 *    schema="PaymentMethod",
 *    title="PaymentMethod",
 *    type="string",
 *    description="Used method for payment",
 *    enum={"CARD"},
 *    example="CARD"
 *  )
 */
final class PaymentMethod extends Enum
{
    public const CARD = 'CARD';
}

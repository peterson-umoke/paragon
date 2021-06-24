<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentType extends Enum
{
    public const Default = 'default';
    public const Deposit = 'deposit';
    public const Withdrawal = 'withdrawal';
    public const Refund = 'refund';
}

<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentStatus extends Enum
{
    public const Successful = 'successful';
    public const Failed = 'failed';
    public const Pending = 'pending';
    public const Default = 'pending';
}

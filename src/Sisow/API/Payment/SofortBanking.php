<?php

namespace Sisow\API\Payment;

use Sisow\API\Payment;

class SofortBanking extends Payment
{
    public function getPaymentIdentifier()
    {
        return 'sofort';
    }
} 

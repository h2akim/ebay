<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

abstract class PaymentsProgram extends Request
{
    public function get(string $marketplaceId, string $paymentProgramType = 'EBAY_PAYMENTS'): Response
    {
        return $this->send('GET', "payments_program/{$marketplaceId}/{$paymentProgramType}", $this->getApiHeaders());
    }

    public function getOnboarding(string $marketplaceId, string $paymentProgramType = 'EBAY_PAYMENTS'): Response
    {
        return $this->send('GET', "payments_program/{$marketplaceId}/{$paymentProgramType}/onboarding", $this->getApiHeaders());
    }
}

<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

class FulfillmentPolicy extends Request
{
    public function getOptedInPrograms(): Response
    {
        return $this->send('GET', 'program/get_opted_in_programs', $this->getApiHeaders());
    }

    public function optIn(string $programType): Response
    {
        return $this->send('POST', 'program/opt_in', $this->getApiHeaders(), [
            'programType' => $programType
        ]);
    }

    public function optOut(string $programType): Response
    {
        return $this->send('POST', 'program/opt_out', $this->getApiHeaders(), [
            'programType' => $programType
        ]);
    }
}

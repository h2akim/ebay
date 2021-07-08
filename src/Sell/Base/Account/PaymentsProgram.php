<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Request;
use Laravie\Codex\Contracts\Response;

abstract class PaymentsProgram extends Request
{
    public function get(string $marketplaceId, string $paymentProgramType): Response
    { /** */
    }
    public function getOnboarding(string $marketplaceId, string $paymentProgramType): Response
    { /** */
    }
}

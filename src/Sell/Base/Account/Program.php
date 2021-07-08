<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Request;
use Laravie\Codex\Contracts\Response;

abstract class FulfillmentPolicy extends Request
{
    public function getOptedInPrograms(): Response
    { /** */
    }
    public function optIn(): Response
    { /** */
    }
    public function optOut(): Response
    { /** */
    }
}

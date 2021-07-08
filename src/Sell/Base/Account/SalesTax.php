<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Request;
use Laravie\Codex\Contracts\Response;

abstract class SalesTax extends Request
{
    public function list(): Response
    { /** */
    }
    public function get(string $id): Response
    { /** */
    }
    public function createOrReplace(): Response
    { /** */
    }
    public function destroy(string $id): Response
    { /** */
    }
}

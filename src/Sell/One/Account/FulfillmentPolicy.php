<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\FulfillmentPolicy as Request;
use Laravie\Codex\Contracts\Response;

class FulfillmentPolicy extends Request
{
    public function list(): Response
    {
        //
    }
    public function get(string $id): Response
    { /** */
    }
    public function getByName(string $name): Response
    { /** */
    }
    public function create(): Response
    { /** */
    }
    public function update(string $id): Response
    { /** */
    }
    public function destroy(string $id): Response
    { /** */
    }
}

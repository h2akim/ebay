<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Request;
use Laravie\Codex\Contracts\Response;

abstract class ReturnPolicy extends Request
{
    public function list(): Response
    { /** */
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

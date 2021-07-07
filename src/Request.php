<?php

namespace Ebay;

use Laravie\Codex\Contracts\Filterable;
use Laravie\Codex\Filter\WithSanitizer;

abstract class Request extends \Laravie\Codex\Request implements Filterable
{
    use WithSanitizer;
}
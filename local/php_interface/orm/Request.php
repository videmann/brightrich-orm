<?php

namespace BrightRich\Http;

use Bitrix\Main\Context;

class Request extends \Bitrix\Main\Request
{
    private function __construct(array $request)
    {
        $server = Context::getCurrent()->getServer();
        parent::__construct($server, $request);
    }

    public static function url(): self
    {
        return new self(Context::getCurrent()->getRequest()->toArray());
    }

    public static function array(array $request): self
    {
        return new self($request);
    }
}
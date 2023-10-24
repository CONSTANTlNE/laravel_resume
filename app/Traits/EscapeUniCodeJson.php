<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait EscapeUniCodeJson
{
    protected function asJson($value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}


<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array
     */
    public function hosts()
    {
        return [
            '192.168.99.100', //@llf added 2021/04/12
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}

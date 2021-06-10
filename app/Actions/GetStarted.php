<?php

namespace App\Actions;

use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class GetStarted
{
    use JsonResponsible;

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $message = 'To proceed using Memoji API please access using url parameter';
        $url = route('all');

        return $this->response(compact('message', 'url'));
    }
}

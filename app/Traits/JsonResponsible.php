<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait JsonResponsible
{
    /**
     * @param  Collection|array  $data
     *
     * @return JsonResponse
     */
    protected function response(Collection | array $data): JsonResponse
    {
        return response()->json($data);
    }
}

<?php

namespace App\Actions;

use App\Memoji\MemojiRepository;
use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class GetAllMemojies
{
    use JsonResponsible;

    /**
     * @param  MemojiRepository  $repository
     *
     * @return JsonResponse
     */
    public function __invoke(MemojiRepository $repository): JsonResponse
    {
        $men = $repository->getAsArray('men');
        $women = $repository->getAsArray('women');
        $all = $men->mergeRecursive($women);
        return $this->response($all->values());
    }
}

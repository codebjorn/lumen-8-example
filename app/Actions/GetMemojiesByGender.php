<?php

namespace App\Actions;

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;
use App\Traits\JsonResponsible;
use App\Validators\GenderValidator;
use Illuminate\Http\JsonResponse;

class GetMemojiesByGender
{
    use JsonResponsible;

    /**
     * @param  string  $gender
     * @param  MemojiRepository  $repository
     *
     * @return JsonResponse
     *
     * @throws MemojiNotFound
     */
    public function __invoke(
        string $gender,
        MemojiRepository $repository
    ): JsonResponse {
        $this->validate($gender, $repository);

        return $this->response($repository->getAsArray($gender));
    }

    /**
     * @param  string  $gender
     * @param  MemojiRepository  $repository
     *
     * @throws MemojiNotFound
     */
    private function validate(string $gender, MemojiRepository $repository): void
    {
        GenderValidator::validate($gender, $repository);
    }
}

<?php

namespace App\Actions;

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;
use App\Traits\JsonResponsible;
use App\Validators\GenderValidator;
use App\Validators\NameValidator;
use Illuminate\Http\JsonResponse;

class GetMemojiByName
{
    use JsonResponsible;

    /**
     * @throws MemojiNotFound
     */
    public function __invoke(
        string $gender,
        string $name,
        MemojiRepository $repository
    ): JsonResponse {
        $this->validate($gender, $name, $repository);

        return $this->response($repository->getAsArray($gender)->get($name));
    }

    /**
     * @throws MemojiNotFound
     */
    private function validate(string $gender, string $name, MemojiRepository $repository): void
    {
        GenderValidator::validate($gender);
        NameValidator::validate($repository->get($gender), $name);
    }
}

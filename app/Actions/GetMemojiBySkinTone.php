<?php

namespace App\Actions;

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;
use App\Traits\JsonResponsible;
use App\Validators\GenderValidator;
use App\Validators\NameValidator;
use App\Validators\SkinToneValidator;
use Illuminate\Http\JsonResponse;

class GetMemojiBySkinTone
{
    use JsonResponsible;

    /**
     * @param  string  $gender
     * @param  string  $name
     * @param  string  $skinTone
     * @param  MemojiRepository  $repository
     *
     * @return JsonResponse
     *
     * @throws MemojiNotFound
     */
    public function __invoke(
        string $gender,
        string $name,
        string $skinTone,
        MemojiRepository $repository
    ): JsonResponse {
        $this->validate($gender, $name, $skinTone, $repository);
        $memoji = $repository->get($gender)->get($name);
        return $this->response($memoji->getSkinTones()->get($skinTone));
    }

    /**
     * @param  string  $gender
     * @param  string  $name
     * @param  string  $skinTone
     * @param  MemojiRepository  $repository
     *
     * @throws MemojiNotFound
     */
    private function validate(
        string $gender,
        string $name,
        string $skinTone,
        MemojiRepository $repository
    ): void {
        GenderValidator::validate($gender);
        NameValidator::validate($repository->get($gender), $name);
        SkinToneValidator::validate($repository->get($gender)->get($name), $skinTone);
    }
}

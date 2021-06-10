<?php

namespace App\Actions;

use App\Exceptions\MemojiNotFound;
use App\Memoji\Memoji;
use App\Memoji\MemojiRepository;
use App\Validators\GenderValidator;
use App\Validators\NameValidator;
use App\Validators\PostureValidator;
use App\Validators\SkinToneValidator;
use Illuminate\Http\Response as BaseResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class GetMemojiByPosture
{
    /**
     * @param  string  $gender
     * @param  string  $name
     * @param  string  $skinTone
     * @param  string  $posture
     * @param  MemojiRepository  $repository
     *
     * @return BaseResponse
     *
     * @throws MemojiNotFound
     */
    public function __invoke(
        string $gender,
        string $name,
        string $skinTone,
        string $posture,
        MemojiRepository $repository
    ): BaseResponse {
        $this->validate($gender, $name, $skinTone, $posture, $repository);
        $memoji = $repository->get($gender)->get($name);
        return $this->imageResponse($memoji, $skinTone, $posture);
    }

    /**
     * @param  Memoji  $memoji
     * @param  string  $skinTone
     * @param  string  $posture
     *
     * @return BaseResponse
     */
    protected function imageResponse(
        Memoji $memoji,
        string $skinTone,
        string $posture
    ): BaseResponse {
        $path = $memoji->getPosturePath($skinTone, $posture);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }

    /**
     * @param  string  $gender
     * @param  string  $name
     * @param  string  $skinTone
     * @param  string  $posture
     * @param  MemojiRepository  $repository
     *
     * @throws MemojiNotFound
     */
    private function validate(
        string $gender,
        string $name,
        string $skinTone,
        string $posture,
        MemojiRepository $repository
    ): void {
        GenderValidator::validate($gender);
        NameValidator::validate($repository->get($gender), $name);

        $memoji = $repository->get($gender)->get($name);
        SkinToneValidator::validate($memoji, $skinTone);
        PostureValidator::validate($memoji, $skinTone, $posture);
    }
}

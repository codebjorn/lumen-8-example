<?php

namespace App\Memoji;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use JetBrains\PhpStorm\ArrayShape;

class Memoji
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $gender;
    /**
     * @var string
     */
    private string $slug;
    /**
     * @var string
     */
    private string $path;
    /**
     * @var array
     */
    private array $skinTones = ['black', 'white'];
    /**
     * @var array
     */
    private array $postures = ['happy', 'hugging', 'thinking', 'winking'];

    /**
     * Memoji constructor.
     *
     * @param  string  $name
     * @param  string  $gender
     * @param  string  $slug
     * @param  string  $path
     * @param  array  $skinTones
     * @param  array  $postures
     */
    public function __construct(
        string $name,
        string $gender,
        string $slug,
        string $path,
        array $skinTones,
        array $postures
    ) {
        $this->name = $name;
        $this->gender = $gender;
        $this->slug = $slug;
        $this->path = $path;
        $this->skinTones = $this->updateSkinTones($skinTones);
        $this->postures = $this->updatePostures($postures);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return route('memojiName', [
            'gender' => $this->gender,
            'name' => $this->slug,
        ]);
    }

    /**
     * @return Collection
     */
    public function getSkinTones(): Collection
    {
        return Collection::make($this->skinTones)
            ->mapWithKeys(function (string $key) {
                $path = "{$this->path}/{$key}";

                if (! File::isDirectory($path)) {
                    return [];
                }

                return [
                    $key => [
                        'url' => "{$this->getUrl()}/${key}",
                        'postures' => $this->getPostures($key),
                    ],
                ];
            });
    }

    /**
     * @param  string  $skinTone
     *
     * @return Collection
     */
    public function getPostures(string $skinTone): Collection
    {
        return Collection::make($this->postures)
            ->mapWithKeys(function (string $key) use ($skinTone) {
                return [
                    $key => route('memojiPosture', [
                        'gender' => $this->gender,
                        'name' => $this->slug,
                        'skinTone' => $skinTone,
                        'posture' => $key,
                    ]),
                ];
            });
    }

    /**
     * @param  string  $skinTone
     * @param  string  $posture
     *
     * @return string
     */
    public function getPosturePath(string $skinTone, string $posture): string
    {
        return "{$this->path}/{$skinTone}/{$posture}.png";
    }

    /**
     * @param  string  $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param  string  $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param  string  $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @param  string  $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @param  array  $skinTones
     *
     * @return array
     */
    public function updateSkinTones(array $skinTones): array
    {
        return Collection::make($this->skinTones)
            ->mergeRecursive($skinTones)
            ->toArray();
    }

    /**
     * @param  array  $postures
     *
     * @return array
     */
    public function updatePostures(array $postures): array
    {
        return Collection::make($this->postures)
            ->mergeRecursive($postures)
            ->toArray();
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'name' => 'string',
        'slug' => 'string',
        'gender' => 'string',
        'url' => 'string',
        'skinTones' => "\Illuminate\Support\Collection",
    ])]
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'gender' => $this->gender,
            'url' => $this->getUrl(),
            'skinTones' => $this->getSkinTones(),
        ];
    }
}

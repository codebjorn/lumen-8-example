<?php

namespace App\Memoji;

use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class MemojiRepositoryFactory
{
    /**
     * @var string
     */
    private string $path;
    /**
     * @var Collection
     */
    private Collection $men;
    /**
     * @var Collection
     */
    private Collection $women;

    /**
     * MemojiRepositoryFactory constructor.
     *
     * @param  string  $path
     * @param  array  $men
     * @param  array  $women
     */
    public function __construct(string $path, array $men, array $women)
    {
        $this->path = $path;
        $this->men = $this->build($men, 'men');
        $this->women = $this->build($women, 'women');
    }

    /**
     * @param  string  $path
     * @param  array  $men
     * @param  array  $women
     *
     * @return MemojiRepository
     */
    public static function make(
        string $path,
        array $men,
        array $women
    ): MemojiRepository {
        return (new static($path, $men, $women))
            ->getInstance();
    }

    /**
     * @return MemojiRepository
     */
    #[Pure]
    public function getInstance(): MemojiRepository
    {
        return new MemojiRepository([
            'men' => $this->men,
            'women' => $this->women,
        ]);
    }

    /**
     * @param  array  $memojies
     * @param  string|null  $gender
     *
     * @return Collection
     */
    private function build(array $memojies, ?string $gender = null): Collection
    {
        return Collection::make($memojies)
            ->map(function (array $data, string $slug) use ($gender) {
                return new Memoji(
                    name: $data['name'] ?? ucfirst($slug),
                    gender: $gender,
                    slug: $slug,
                    path: "{$this->path}/{$gender}/{$slug}",
                    skinTones: $data['skinTone'] ?? [],
                    postures: $data['postures'] ?? []
                );
            });
    }
}

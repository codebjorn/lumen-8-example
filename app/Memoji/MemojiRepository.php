<?php

namespace App\Memoji;

use Illuminate\Config\Repository as BaseRepository;
use Illuminate\Support\Collection;

class MemojiRepository extends BaseRepository
{
    /**
     * @param $key
     * @param  null  $default
     *
     * @return Collection
     */
    public function getAsArray($key, $default = null): Collection
    {
        $item = parent::get($key, $default);
        return $item->map(fn (Memoji $memoji) => $memoji->toArray());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $keys = array_keys($this->items);
        $items = array_map(function (Collection $item) {
            return $item->map(fn (Memoji $memoji) => $memoji->toArray());
        }, $this->items, $keys);

        $this->items = array_combine($keys, $items);
        return $this->items;
    }
}

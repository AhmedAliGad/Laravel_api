<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        static::$wrap = 'categories';
        return [
            'name' => $this->name,
            'image' => $this->image ? $this->image : url('/front/img/car1.jpg'),
            'posts_count' => count($this->posts)
        ];
    }
}

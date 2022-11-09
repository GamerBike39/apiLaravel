<?php

namespace App\Http\Resources;
use App\Http\Controllers\LivreController;
use Illuminate\Http\Resources\Json\JsonResource;

class LivreApi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }





}

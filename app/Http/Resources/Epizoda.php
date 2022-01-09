<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Epizoda extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'epizoda_id' => $this->id,
            'broj' => $this->broj,
            'opis' => $this->opis,
            'sezona_id' => $this->sezona_id,
            'ocena' => $this->ocena
        ];
    }
}

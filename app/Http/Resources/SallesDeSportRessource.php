<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SallesDeSportRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gerant = new UsersRessource($this->gerant);
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lieu' => $this->lieu,
            'email' => $this->email,
            'horaire' => $this->horaire,
            'gerant' => $gerant,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeancesRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'exercice' => $this->exercice,
            'quantite_serie' => $this->quantite_serie,
            'temps_recuperation' => $this->temps_recuperation,
            'nombre_jours' => $this->nombre_jours
        ];;
    }
}

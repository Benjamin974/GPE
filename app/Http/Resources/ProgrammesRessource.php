<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgrammesRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $coach = new UsersRessource($this->coach);
        $salleDeSport = new SallesDeSportRessource($this->salleDeSport);
        $seance = new SeancesRessource($this->seance);
        $image = new ImagesResource($this->image);
        return [
            'id' => $this->id,
            'coach' => $coach,
            'salleDeSport' => $salleDeSport,
            'seance' => $seance,
            'name' => $this->name,
            'difficulte' => $this->difficulte,
            'nbre_seance_semaine' => $this->nbre_seance_semaine,
            'image' => $image
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersRessource extends JsonResource
{

    private $token = null;
    public function __construct($resource, $token = null)
    {
        $this->token = $token;
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
        if (isset($this->token)) {
            $role = new RolesRessource($this->role);

            return [
                'id' => $this->id,
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => $this->password,
                'token' => $this->token,
                'role' => $role,
                'programme' => $this->programme
            ];
        } else {
            return parent::toArray($request);
        }
    }
}

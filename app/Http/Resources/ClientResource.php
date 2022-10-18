<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'                      => $this->id,
            'client_type'             => $this->client_type,
            'company_id'              => $this->company_id,
            'civility'                => $this->civility,
            'l_name'                  => $this->l_name,
            'f_name'                  => $this->f_name,
            'date_of_birth'           => $this->date_of_birth,
            'place_of_birth'          => $this->place_of_birth,
            'address'                 => $this->address,
            'phone1'                  => $this->phone1,
            'phone2'                  => $this->phone2,
            'email'                   => $this->email,
            'permis_numero'           => $this->permis_numero,
            'permis_delivered_on'     => $this->permis_delivered_on,
            'permis_valid_until'      => $this->permis_valid_until,
            'permis_place_delivred'   => $this->permis_place_delivred,
            'identity_type'           => $this->identity_type,
            'identity_numero'         => $this->identity_numero,
            'identity_valid_until'    => $this->identity_valid_until,
            'identity_place_delivred' => $this->identity_place_delivred,
            'permis_front_image'      => $this->permis_front_image,
            'permis_back_image'       => $this->permis_back_image,
            'identity_front_iamge'    => $this->identity_front_iamge,
            'identity_back_image'     => $this->identity_back_image,
            'observation'             => $this->observation,
            'is_list_black'           => $this->is_list_black,
        ];
    }
}

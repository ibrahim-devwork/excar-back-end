<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match(Route::currentRouteName()){
            'store-client'  => ['permis_numero'   => ['bail', 'required', 'unique:clients,permis_numero', 'max:20'],
                                'identity_numero' => ['bail', 'required', 'unique:clients,identity_numero', 'max:20'],
                               ] + $this->createOrUpdate(),

            'update-client' => ['id' => 'exists:posts,id',
                                'permis_numero'   => ['bail', 'required', 'unique:clients,permis_numero,'.$this->id, 'max:20'],
                                'identity_numero' => ['bail', 'required', 'unique:clients,identity_numero,'.$this->id, 'max:20'],
                               ] + $this->createOrUpdate(),

            'client-filter' => [ 'search'         => 'nullable',
                                 'company_id'     => 'nullable',
                                 'is_list_black'  => 'nullable',
                                 'count_per_page' => 'nullable'
                               ],

            'delete-client', 'active-client', 'unactive-client' => ['id' => 'exists:clients,id'],
        };
    }

    public function createOrUpdate()
    {
        return [
            'client_type'             => ['bail', 'required', 'boolean'],
            'company_id'              => ['bail', 'nullable', 'required_if:client_type,1', 'numeric'],
            'civility'                => ['bail', 'required', 'max:5'],
            'l_name'                  => ['bail', 'required', 'max:40'],
            'f_name'                  => ['bail', 'required', 'max:30'],
            'date_of_birth'           => ['bail', 'nullable', 'date'],
            'place_of_birth'          => ['bail', 'nullable', 'max:30'],
            'address'                 => ['bail', 'nullable', 'max:150'],
            'phone1'                  => ['bail', 'required', 'max:15'],
            'phone2'                  => ['bail', 'nullable', 'max:15'],
            'email'                   => ['bail', 'nullable', 'max:50'],
            'permis_delivered_on'     => ['bail', 'required', 'date'],
            'permis_valid_until'      => ['bail', 'required', 'date'],
            'permis_place_delivred'   => ['bail', 'required', 'max:30'],
            'identity_type'           => ['bail', 'required', 'boolean'],
            'identity_valid_until'    => ['bail', 'required', 'date'],
            'identity_place_delivred' => ['bail', 'required', 'max:30'],
            'permis_front_image'      => ['bail', 'nullable', 'mimes:jpeg,png,jpg'],
            'permis_back_image'       => ['bail', 'nullable', 'mimes:jpeg,png,jpg'],
            'identity_front_iamge'    => ['bail', 'nullable', 'mimes:jpeg,png,jpg'],
            'identity_back_image'     => ['bail', 'nullable', 'mimes:jpeg,png,jpg'],
            'observation'             => ['bail', 'nullable', 'max:250'],
            'is_list_black'           => ['bail', 'required', 'boolean'],
        ];
    }

}

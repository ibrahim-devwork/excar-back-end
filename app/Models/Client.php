<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'clients';

    protected $fillable = [
        'client_type',
        'company_name',
        'company_ice',
        'company_address',
        'company_phone',
        'company_email',
        'civility',
        'l_name',
        'f_name',
        'date_of_birth',
        'place_of_birth',
        'address',
        'phone1',
        'phone2',
        'email',
        'permis_numero',
        'permis_delivered_on',
        'permis_valid_until',
        'permis_place_delivred',
        'identity_type',
        'identity_numero',
        'identity_valid_until',
        'identity_place_delivred',
        'permis_front_image',
        'permis_back_image',
        'identity_front_iamge',
        'identity_back_image',
        'observation',
        'is_list_black',
        'agency_id'
    ];
    
    public function scopeSearch($query, $data) {
        return $query->where('l_name'         , 'like', "%{$data['search']}%")
                    ->orWhere('f_name'         , 'like', "%{$data['search']}%")
                    ->orWhere('permis_numero'  , 'like', "%{$data['search']}%")
                    ->orWhere('identity_numero', 'like', "%{$data['search']}%");
    }
}

<?php
namespace App\Repositories\Clients;

use App\Models\Client;
use App\Helpers\Helper;
use App\Helpers\TablesHelper;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ClientResource;

class ClientRepository extends BaseRepository implements InterfaceClientRepository
{
    protected $model;

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
    
    public function getByFilter($data) 
    {    
        $user = Auth::user();
        $records = $this->model->where('agency_id', $user->id);
        
        $count_per_page = Helper::count_per_page;
        if(isset($data['count_per_page']) && $data['count_per_page'])
            $count_per_page = $data['count_per_page'];
        
        if(isset($data['is_list_black']) && $data['is_list_black'])
            $records = $records->where('is_list_black', $data['is_list_black']);

        if(isset($data['company_id']) && $data['company_id'])
            $records = $records->where('company_id', $data['company_id']);
        
        if(isset($data['search'])  && $data['search'])
            $records = $records->search($data);
        
        return ClientResource::collection( $records->orderBy('id', 'DESC')->paginate($count_per_page) );
    }

    public function store($data)
    {
        $user                           = Auth::user();
        $model                          = new $this->model;
        $model->client_type             = $data['client_type'];
        $model->company_id              = $data['company_id'] ?? null;
        $model->civility                = $data['civility'];
        $model->l_name                  = $data['l_name'];
        $model->f_name                  = $data['f_name'];
        $model->date_of_birth           = $data['date_of_birth'] ?? null;
        $model->place_of_birth          = $data['place_of_birth'] ?? null;
        $model->address                 = $data['address'] ?? null;
        $model->phone1                  = $data['phone1'];
        $model->phone2                  = $data['phone2'] ?? null;
        $model->email                   = $data['email'] ?? null;
        $model->permis_numero           = $data['permis_numero'];
        $model->permis_delivered_on     = $data['permis_delivered_on'];
        $model->permis_valid_until      = $data['permis_valid_until'];
        $model->permis_place_delivred   = $data['permis_place_delivred'];
        $model->identity_type           = $data['identity_type'];
        $model->identity_numero         = $data['identity_numero'];
        $model->identity_valid_until    = $data['identity_valid_until'];
        $model->identity_place_delivred = $data['identity_place_delivred'];
        $model->permis_front_image      = isset($data['permis_front_image']) ? Helper::saveFile($data['permis_front_image'], 'clients') : null;
        $model->permis_back_image       = isset($data['permis_back_image']) ? Helper::saveFile($data['permis_back_image'], 'clients') : null;
        $model->identity_front_iamge    = isset($data['identity_front_iamge']) ? Helper::saveFile($data['identity_front_iamge'], 'clients') : null;
        $model->identity_back_image     = isset($data['identity_back_image']) ? Helper::saveFile($data['identity_back_image'], 'clients') : null;
        $model->observation             = $data['observation'] ?? null;
        $model->is_list_black           = $data['is_list_black'];
        $model->agency_id               = $user->id;
        $model->save();

        return $model;
    }

    public function update($id, $data)
    {
        $model                          = $this->model->find($id);
        $model->client_type             = $data['client_type'];
        $model->company_id              = $data['company_id'] ?? null;
        $model->civility                = $data['civility'];
        $model->l_name                  = $data['l_name'];
        $model->f_name                  = $data['f_name'];
        $model->date_of_birth           = $data['date_of_birth'] ?? null;
        $model->place_of_birth          = $data['place_of_birth'] ?? null;
        $model->address                 = $data['address'] ?? null;
        $model->phone1                  = $data['phone1'];
        $model->phone2                  = $data['phone2'] ?? null;
        $model->email                   = $data['email'] ?? null;
        $model->permis_numero           = $data['permis_numero'];
        $model->permis_delivered_on     = $data['permis_delivered_on'];
        $model->permis_valid_until      = $data['permis_valid_until'];
        $model->permis_place_delivred   = $data['permis_place_delivred'];
        $model->identity_type           = $data['identity_type'];
        $model->identity_numero         = $data['identity_numero'];
        $model->identity_valid_until    = $data['identity_valid_until'];
        $model->identity_place_delivred = $data['identity_place_delivred'];
        $model->permis_front_image      = (isset($data['permis_front_image']) && $data['permis_front_image']) ? Helper::saveFile($data['permis_front_image'], 'clients') : $model->permis_front_image;
        $model->permis_back_image       = (isset($data['permis_back_image']) &&  $data['permis_back_image']) ? Helper::saveFile($data['permis_back_image'], 'clients') : $model->permis_back_image;
        $model->identity_front_iamge    = (isset($data['identity_front_iamge']) && $data['identity_front_iamge']) ? Helper::saveFile($data['identity_front_iamge'], 'clients') : $model->identity_front_iamge;
        $model->identity_back_image     = (isset($data['identity_back_image']) && $data['identity_back_image']) ? Helper::saveFile($data['identity_back_image'], 'clients') : $model->identity_back_image;
        $model->observation             = $data['observation'] ?? null;
        $model->is_list_black           = $data['is_list_black'];
        $model->update();

        return $model;
    }

    public function getDropdown()
    {   
        $user = Auth::user();
        return DB::table(TablesHelper::Clients)->select('id', 'l_name', 'identity_numero')
                    ->where('agency_id', $user->agency_id)
                    ->where('is_list_black', false)
                    ->orderByDesc('id')
                    ->get();
    }
}
?>
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repositories\Clients\InterfaceClientRepository;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(InterfaceClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(ClientRequest $clientRequest)
    {
        try {
            $data = $clientRequest->validated();
            return $this->clientRepository->getByFilter($data);
        } catch(\Exception $error) {
            Log::error('ClientController - ( index ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->clientRepository->getById($id);
        } catch(\Exception $error) {
            Log::error('ClientController - ( show ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function store(ClientRequest $clientRequest)
    {
        try {
            $data = $clientRequest->validated();
            return $this->clientRepository->store($data);
        } catch(\Exception $error) {
            Log::error('ClientController - ( store ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function update($id, ClientRequest $clientRequest)
    {
        try {
            $data = $clientRequest->validated();
            return $this->clientRepository->update($id, $data);
        } catch(\Exception $error) {
            Log::error('ClientController - ( update ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function delete($id, ClientRequest $clientRequest)
    {
        try {
            return $this->clientRepository->delete($id);
        } catch(\Exception $error) {
            Log::error('ClientController - ( delete ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function active($id, ClientRequest $clientRequest)
    {
        try {
            return $this->clientRepository->active($id);
        } catch(\Exception $error) {
            Log::error('ClientController - ( active ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function unactive($id, ClientRequest $clientRequest)
    {
        try {
            return $this->clientRepository->unactive($id);
        } catch(\Exception $error) {
            Log::error('ClientController - ( unactive ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }

    public function getDropdown()
    {
        try {
            return $this->clientRepository->getDropdown();
        } catch(\Exception $error) {
            Log::error('ClientController - ( getDropdown ) : ' . $error->getMessage());
            return response()->json(['Internal Server Error !'], 500);
        }
    }
}

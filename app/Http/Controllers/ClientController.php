<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Récupère tous les clients.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $clients = Client::all();

        return response()->json(['clients' => $clients]);
    }

    /**
     * Crée un nouveau client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'contact' => 'required|string',
            'tele' => 'required|string',
            'email' => 'required|email|unique:clients,email',
        ]);

        $client = Client::create($request->all());

        return response()->json(['client' => $client], 201);
    }

    /**
     * Récupère un client par ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client non trouvé.'], 404);
        }

        return response()->json(['client' => $client]);
    }

    /**
     * Met à jour un client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client non trouvé.'], 404);
        }

        $request->validate([
            'nom' => 'required|string',
            'contact' => 'required|string',
            'tele' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
        ]);

        $client->update($request->all());

        return response()->json(['client' => $client]);
    }

    /**
     * Supprime un client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client non trouvé.'], 404);
        }

        $client->delete();

        return response()->json(['message' => 'Client supprimé avec succès.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DemandeSpeciale;
use Illuminate\Http\Request;

class DemandeSpecialeController extends Controller
{
    /**
     * Récupère toutes les demandes spéciales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $demandeSpeciales = DemandeSpeciale::all();

        return response()->json(['demandeSpeciales' => $demandeSpeciales]);
    }

    /**
     * Crée une nouvelle demande spéciale.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'objet' => 'required|string',
            'description' => 'required|string',
            'id_client' => 'required|exists:clients,id',
        ]);

        $demandeSpeciale = DemandeSpeciale::create($request->all());

        return response()->json(['demandeSpeciale' => $demandeSpeciale], 201);
    }

    /**
     * Récupère une demande spéciale par ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $demandeSpeciale = DemandeSpeciale::find($id);

        if (!$demandeSpeciale) {
            return response()->json(['message' => 'Demande spéciale non trouvée.'], 404);
        }

        return response()->json(['demandeSpeciale' => $demandeSpeciale]);
    }

    /**
     * Met à jour une demande spéciale.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $demandeSpeciale = DemandeSpeciale::find($id);

        if (!$demandeSpeciale) {
            return response()->json(['message' => 'Demande spéciale non trouvée.'], 404);
        }

        $request->validate([
            'objet' => 'required|string',
            'description' => 'required|string',
            'id_client' => 'required|exists:clients,id',
        ]);

        $demandeSpeciale->update($request->all());

        return response()->json(['demandeSpeciale' => $demandeSpeciale]);
    }

    /**
     * Supprime une demande spéciale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $demandeSpeciale = DemandeSpeciale::find($id);

        if (!$demandeSpeciale) {
            return response()->json(['message' => 'Demande spéciale non trouvée.'], 404);
        }

        $demandeSpeciale->delete();

        return response()->json(['message' => 'Demande spéciale supprimée avec succès.']);
    }
}

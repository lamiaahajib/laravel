<?php

namespace App\Http\Controllers;

use App\Models\AvisPassage;
use Illuminate\Http\Request;

class AvisPassageController extends Controller
{
    /**
     * Récupère tous les avis de passage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $avisPassages = AvisPassage::all();

        return response()->json(['avisPassages' => $avisPassages]);
    }

    /**
     * Crée un nouvel avis de passage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'nom_site' => 'required|string',
            'statut' => 'required|string',
            'autorisation' => 'required|boolean',
            'id_client' => 'required|exists:clients,id',
        ]);

        $avisPassage = AvisPassage::create($request->all());

        return response()->json(['avisPassage' => $avisPassage], 201);
    }

    /**
     * Récupère un avis de passage par ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $avisPassage = AvisPassage::find($id);

        if (!$avisPassage) {
            return response()->json(['message' => 'Avis de passage non trouvé.'], 404);
        }

        return response()->json(['avisPassage' => $avisPassage]);
    }

    /**
     * Met à jour un avis de passage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $avisPassage = AvisPassage::find($id);

        if (!$avisPassage) {
            return response()->json(['message' => 'Avis de passage non trouvé.'], 404);
        }

        $request->validate([
            'date' => 'required|date',
            'nom_site' => 'required|string',
            'statut' => 'required|string',
            'autorisation' => 'required|boolean',
            'id_client' => 'required|exists:clients,id',
        ]);

        $avisPassage->update($request->all());

        return response()->json(['avisPassage' => $avisPassage]);
    }

    /**
     * Supprime un avis de passage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $avisPassage = AvisPassage::find($id);

        if (!$avisPassage) {
            return response()->json(['message' => 'Avis de passage non trouvé.'], 404);
        }

        $avisPassage->delete();

        return response()->json(['message' => 'Avis de passage supprimé avec succès.']);
    }
}

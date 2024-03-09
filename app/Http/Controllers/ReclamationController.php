<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    /**
     * Récupère toutes les réclamations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $reclamations = Reclamation::all();

        return response()->json(['reclamations' => $reclamations]);
    }

    /**
     * Crée une nouvelle réclamation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'object' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'id_client' => 'required|exists:clients,id',
        ]);

        $reclamation = Reclamation::create($request->all());

        return response()->json(['reclamation' => $reclamation], 201);
    }

    /**
     * Récupère une réclamation par ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $reclamation = Reclamation::find($id);

        if (!$reclamation) {
            return response()->json(['message' => 'Réclamation non trouvée.'], 404);
        }

        return response()->json(['reclamation' => $reclamation]);
    }

    /**
     * Met à jour une réclamation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $reclamation = Reclamation::find($id);

        if (!$reclamation) {
            return response()->json(['message' => 'Réclamation non trouvée.'], 404);
        }

        $request->validate([
            'object' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'id_client' => 'required|exists:clients,id',
        ]);

        $reclamation->update($request->all());

        return response()->json(['reclamation' => $reclamation]);
    }

    /**
     * Supprime une réclamation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);

        if (!$reclamation) {
            return response()->json(['message' => 'Réclamation non trouvée.'], 404);
        }

        $reclamation->delete();

        return response()->json(['message' => 'Réclamation supprimée avec succès.']);
    }
}

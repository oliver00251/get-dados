<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{

        // Método para consultar todos os leads
        public function index()
        {
            $leads = Lead::all();
            return response()->json($leads);
        }

        // Método para criar um novo lead
        public function store(Request $request)
        {
            $request->validate([
                'ip' => 'required|string',
                'cidade' => 'required|string',
                'regiao' => 'required|string',
                'url' => 'required|string',
            ]);

            $lead = Lead::create([
                'ip' => $request->ip,
                'cidade' => $request->cidade,
                'regiao' => $request->regiao,
                'url' => $request->url,
            ]);

            return response()->json($lead, 201); // Retorna o lead criado com status 201
        }
    }


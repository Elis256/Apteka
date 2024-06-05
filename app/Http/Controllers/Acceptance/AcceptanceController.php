<?php

namespace App\Http\Controllers\Acceptance;

use App\Http\Controllers\Controller;
use App\Models\Acceptance;
use App\Models\Drug;
use App\Models\DrugAcceptances;
use Illuminate\Support\Facades\DB;

class AcceptanceController extends Controller
{
    public function index()
    {
        $acceptances = Acceptance::all();
        return view('acceptance.index', compact('acceptances'));
    }

    public function create()
    {
        $drugs = Drug::all();
        return view('acceptance.create', compact('drugs'));
    }

    public function store()
    {
        $data = request()->validate([
            'supplier'=>'required',
            'drugs'=>'required',
            'quantity'=>'required',
        ]);

        $drugs = $data['drugs'];
        $quantity = $data['quantity'];
        unset($data['drugs']);
        unset($data['quantity']);

        $acceptance = Acceptance::create($data);
        $user = auth()->user();
        $user->write_offs()->save($acceptance);
        $acceptance->drugs()->attach($drugs);

        foreach ($drugs as $drug){
            foreach ($quantity as $index => $quant){
                if ($quant !== null) {
                    DrugAcceptances::where('acceptance_id', $acceptance->id)
                        ->where('drug_id', $drug)
                        ->update(['quantity' => $quant]);
                    Drug::where('id', $drug)
                        ->update(['quantity' => DB::raw('quantity + ' . $quant)]);
                    unset($quantity[$index]);
                    break;
                }
            }
        }


        return redirect()->route('acceptance.index');
    }

    public function show(Acceptance $acceptance)
    {
        $drugAcceptances = DrugAcceptances::where('acceptance_id' , $acceptance->id)->get();
        return view('acceptance.show' , compact('acceptance', 'drugAcceptances'));
    }
}

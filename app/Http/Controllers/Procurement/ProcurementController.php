<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\DrugProcurement;
use App\Models\DrugWriteOffs;
use App\Models\Procurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurements = Procurement::all();
        return view('procurement.index', compact('procurements'));
    }

    public function create()
    {
        $drugs = Drug::all();
        return view('procurement.create', compact('drugs'));
    }

    public function store()
    {
        $data = request()->validate([
            'drugs'=>'required',
            'quantity'=>'required',
        ]);
        $drugs = $data['drugs'];
        $quantity = $data['quantity'];

        unset($data['drugs']);
        unset($data['quantity']);

        $procurement = Procurement::create($data);
        $user = auth()->user();
        $user->procurement()->save($procurement);
        $procurement->drugs()->attach($drugs);

        foreach ($drugs as $drug){
            foreach ($quantity as $index => $quant){
                if ($quant !== null) {
                    DrugProcurement::where('procurement_id', $procurement->id)
                        ->where('drug_id', $drug)
                        ->update(['quantity' => $quant]);
                    unset($quantity[$index]);
                    break;
                }
            }
        }

        return redirect()->route('procurement.index');
    }

    public function show(Procurement $procurement)
    {
        $drug_procurements = DrugProcurement::where('procurement_id' , $procurement->id)->get();
        return view('procurement.show' , compact('procurement', 'drug_procurements'));
    }

//    public function edit(Release $release)
//    {
//        $drugReleases = DrugReleases::where('release_id' , $release->id)->get();
//        return view('release.edit' , compact('release', 'drugReleases'));
//    }
//
//    public function update(Release $release)
//    {
//        $data = request()->validate([
//            'status'=> 'required',
//        ]);
//
//        $status = request('status');
//
//        $release->update(['status' => $status]);
//
//        return redirect()->route('release.show' , $release->id);
//    }
}

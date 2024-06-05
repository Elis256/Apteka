<?php

namespace App\Http\Controllers\WriteOff;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\DrugWriteOffs;
use App\Models\WriteOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WriteOffController extends Controller
{
    public function index()
    {
        $write_offs = WriteOff::all();
        return view('write_off.index', compact('write_offs'));
    }

    public function create()
    {
        $drugs = Drug::all();
        return view('write_off.create', compact('drugs'));
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

        $write_off = WriteOff::create($data);
        $user = auth()->user();
        $user->write_offs()->save($write_off);
        $write_off->drugs()->attach($drugs);

        foreach ($drugs as $drug){
            foreach ($quantity as $index => $quant){
                if ($quant !== null) {
                    DrugWriteOffs::where('write_off_id', $write_off->id)
                        ->where('drug_id', $drug)
                        ->update(['quantity' => $quant]);
                    Drug::where('id', $drug)
                        ->update(['quantity' => DB::raw('quantity - ' . $quant)]);
                    unset($quantity[$index]);
                    break;
                }
            }
        }


        return redirect()->route('write_off.index');
    }

    public function show(WriteOff $write_off)
    {
        $drug_write_offs = DrugWriteOffs::where('write_off_id' , $write_off->id)->get();
        return view('write_off.show' , compact('write_off', 'drug_write_offs'));
    }
//
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

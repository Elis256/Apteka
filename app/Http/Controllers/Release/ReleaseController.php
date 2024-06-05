<?php

namespace App\Http\Controllers\Release;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\DrugReleases;
use App\Models\Release;
use App\Models\User;
use App\Models\WriteOff;
use Illuminate\Support\Facades\DB;

class ReleaseController extends Controller
{
    public function index()
    {
        $releases = Release::all();
        return view('release.index', compact('releases'));
    }

    public function create()
    {
        $drugs = Drug::all();
        return view('release.create', compact('drugs'));
    }

    public function store()
    {
        $data = request()->validate([
            'status'=>'',
            'drugs'=>'required',
            'quantity'=>'required',
        ]);
        $data['status'] = 'Ожидает подтверждения';
        $drugs = $data['drugs'];
        $quantity = $data['quantity'];

        unset($data['drugs']);
        unset($data['quantity']);

        $release = Release::create($data);
        $user = auth()->user();
        $user->write_offs()->save($release);
        $release->drugs()->attach($drugs);

        foreach ($drugs as $drug){
            foreach ($quantity as $index => $quant){
                if ($quant !== null) {
                    DrugReleases::where('release_id', $release->id)
                        ->where('drug_id', $drug)
                        ->update(['quantity' => $quant]);
                    Drug::where('id', $drug)
                        ->update(['quantity' => DB::raw('quantity - ' . $quant)]);
                    unset($quantity[$index]);
                    break;
                }
            }
        }


        return redirect()->route('release.index');
    }

    public function show(Release $release)
    {
        $drugReleases = DrugReleases::where('release_id' , $release->id)->get();
        return view('release.show' , compact('release', 'drugReleases'));
    }

    public function edit(Release $release)
    {
        $drugReleases = DrugReleases::where('release_id' , $release->id)->get();
        return view('release.edit' , compact('release', 'drugReleases'));
    }

    public function update(Release $release)
    {
        $data = request()->validate([
            'status'=> 'required',
        ]);

        $status = request('status');

        $release->update(['status' => $status]);

        return redirect()->route('release.show' , $release->id);
    }
}

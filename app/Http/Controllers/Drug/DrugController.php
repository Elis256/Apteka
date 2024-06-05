<?php

namespace App\Http\Controllers\Drug;

use App\Http\Controllers\Controller;
use App\Http\Filters\DrugFilter;
use App\Http\Requests\Drug\FilterRequset;
use App\Models\Acceptance;
use App\Models\Drug;
use App\Models\DrugAcceptances;

class DrugController extends Controller
{
    public function index(FilterRequset $request)
    {
        $drugs = Drug::all();

//        $data = $request->validated();
//
//        $filter = app()->make(DrugFilter::class, ['queryParams' => array_filter($data)]);
//
//        $drugs = Drug::filter($filter)->get();
//
//        dd($drugs);

        return view('drug.index', compact('drugs'));
    }

    public function create()
    {
        $drugs = Drug::all();

        return view('drug.create', compact('drugs'));
    }

    public function store()
    {
        $data = request()->validate([
            'title'=> 'string',
            'description'=> 'string',
            'dosage'=> 'decimal:0,4',
            'cost'=> 'decimal:0,4',
            'quantity'=> 'integer|nullable',
        ]);

        Drug::create($data);
        return redirect()->route('acceptance.create');
    }

    public function show(Drug $drug)
    {
        return view('drug.show' , compact('drug'));
    }

    public function edit(Drug $drug)
    {
        return view('drug.edit' , compact('drug'));
    }

    public function update(Drug $drug)
    {
        $data = request()->validate([
            'title'=> 'string',
            'description'=> 'string',
            'cost'=> 'decimal:0,4',
            'quantity'=> 'integer|nullable',
        ]);

        $drug->update($data);

        return redirect()->route('acceptance.create' , $drug->id);
    }

    public function delete(Drug $drug)
    {
        $drug->delete();
        return redirect()->route('drug.index');
    }
}

<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class DrugFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
//    public const DOSAGE = 'dosage';
//    public const COST = 'cost';
//    public const QUANTITY = 'quantity';



    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
//            self::DOSAGE => [$this, 'dosage'],
//            self::COST => [$this, 'cost'],
//            self::QUANTITY => [$this, 'quantity'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

//    public function dosage(Builder $builder, $value)
//    {
//        $builder->where('dosage', 'like', "%{$value}%");
//    }
//
//    public function cost(Builder $builder, $value)
//    {
//        $builder->where('cost', 'like', "%{$value}%");
//    }
//
//    public function quantity(Builder $builder, $value)
//    {
//        $builder->where('quantity', 'like', "%{$value}%");
//    }

}

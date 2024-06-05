<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $quantity
 * @property int $drug_id
 * @property int $acceptance_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereAcceptanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugAcceptances whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DrugAcceptances extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'quantity',
        'drug_id',
        'acceptance_id',
    ];
}

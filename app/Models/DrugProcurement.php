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
 * @property int $procurement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereProcurementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugProcurement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DrugProcurement extends Model
{
    use HasFactory;
}

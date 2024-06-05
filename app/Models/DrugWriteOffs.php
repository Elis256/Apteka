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
 * @property int $write_off_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugWriteOffs whereWriteOffId($value)
 * @mixin \Eloquent
 */
class DrugWriteOffs extends Model
{
    use HasFactory;
}

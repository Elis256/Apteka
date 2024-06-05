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
 * @property int $release_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereReleaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugReleases whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DrugReleases extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quantity',
        'drug_id',
        'release_id',
    ];
}

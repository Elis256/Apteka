<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $dosage
 * @property float $cost
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Acceptance> $acceptances
 * @property-read int|null $acceptances_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Procurement> $procurements
 * @property-read int|null $procurements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Release> $releases
 * @property-read int|null $releases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WriteOff> $write_offs
 * @property-read int|null $write_offs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Drug filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDosage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Drug extends Model
{
    use Filterable;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'dosage',
        'cost',
        'quantity',
    ];

    public function acceptances()
    {
        return $this->belongsToMany(Acceptance::class, 'drug_acceptances', 'drug_id', 'acceptance_id');
    }
    public function releases()
    {
        return $this->belongsToMany(Release::class, 'drug_releases', 'drug_id', 'release_id');
    }
    public function write_offs()
    {
        return $this->belongsToMany(WriteOff::class, 'drug_write_offs', 'drug_id', 'write_off_id');
    }
    //adsdasdasdasdad
    public function procurements()
    {
        return $this->belongsToMany(Procurement::class, 'procurements', 'drug_id', 'procurement_id');
    }
}

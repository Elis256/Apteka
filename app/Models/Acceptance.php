<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $supplier
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Drug> $drugs
 * @property-read int|null $drugs_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acceptance whereUserId($value)
 * @mixin \Eloquent
 */
class Acceptance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'supplier',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_acceptances', 'acceptance_id', 'drug_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Drug> $drugs
 * @property-read int|null $drugs_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurement whereUserId($value)
 * @mixin \Eloquent
 */
class Procurement extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_procurements', 'procurement_id', 'drug_id');
    }
}

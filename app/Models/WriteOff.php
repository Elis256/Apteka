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
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff query()
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WriteOff whereUserId($value)
 * @mixin \Eloquent
 */
class WriteOff extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_write_offs', 'write_off_id', 'drug_id');
    }

}

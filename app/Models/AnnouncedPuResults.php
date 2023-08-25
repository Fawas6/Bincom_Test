<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnnouncedPuResults extends Model
{
    use HasFactory;

    protected $table = 'announced_pu_results';

    protected $fillable = [
        'polling_unit_uniqueid',
        'party_abbreviation',
        'party_score',
    ];

    public function announcedPuResults(): HasMany {
        return $this->hasMany(AnnouncedPuResults::class);
    }

}

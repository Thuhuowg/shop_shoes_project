<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class District extends Model
{
    use HasFactory;
    /**
     * The roles that belong to the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function provinces(): BelongsToMany
    {
        return $this->belongsToMany(Province::class);
    }
}

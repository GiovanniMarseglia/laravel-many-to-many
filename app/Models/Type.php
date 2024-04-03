<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use app\Models\Project;
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];


    public function Project(): HasMany {
        return $this->HasMany(Project::class);
    }
}

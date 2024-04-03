<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Project;
class Technologia extends Model
{
    use HasFactory;


    protected $fillable=[
        'name'
    ];


    public function projects():BelongsToMany{
        return $this->belongsToMany(Project::class);
    }
}

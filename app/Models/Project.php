<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Technologia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumb',
        'date',
        'slug',
        'type_id',
    ];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');

    }

    public function type():BelongsTo {
        return $this->BelongsTo(Type::class);
    }

    public function technologias():BelongsToMany{
        return $this->belongsToMany(Technologia::class);
    }

}

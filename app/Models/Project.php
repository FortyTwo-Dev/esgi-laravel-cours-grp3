<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'technologies' => 'array',      // JSON → Array
            'created_at' => 'datetime',     // Timestamp → Carbon DateTime
            'updated_at' => 'datetime',     // Timestamp → Carbon DateTime
            'published' => 'boolean',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'thumbnail',
        'project_date',
        'status',
        'description',
        'features',
        'tech_stack',
        'screenshots',
        'github_url',
    ];

    protected $casts = [
        'features'     => 'array',
        'tech_stack'   => 'array',
        'screenshots'  => 'array',
        'project_date' => 'date',
    ];
}
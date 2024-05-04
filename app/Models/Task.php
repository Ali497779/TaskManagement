<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'deadline'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class,'task_id');
    }
    
    public function scopeFilter($query, $request): void
    {
        if (isset($request->status)) {
            $query->where('status', $request->status);
        }
    }
}

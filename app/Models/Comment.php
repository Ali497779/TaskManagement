<?php

namespace App\Models;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'task_id',
        'user_id',
        'text',
    ];

    public function task():BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

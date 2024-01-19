<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReplySupport extends Model
{
    use HasFactory, HasUuids;

    // referenciando qual tabela o model vai se relacionar,
    // pois os nomes não são iguais
    protected $table = 'replies_support';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}

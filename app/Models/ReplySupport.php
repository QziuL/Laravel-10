<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    // quando usar o 'with', trazer o usuario no relacionamento
    protected $with = ['user'];

    protected static function booted(): void
    {
        static::addGlobalScope('orderBy', function (Builder $builder) {
            $builder->latest();
        });
    }

    protected $fillable = [
        'user_id',
        'support_id',
        'content',
    ];

    // ACESSOR
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $createdAt) => Carbon::make($createdAt)->format('H:i d/m/Y'),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}

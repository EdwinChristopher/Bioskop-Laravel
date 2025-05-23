<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Ticket extends Model
{
    use HasFactory;
    protected $table='tickets';
    protected $primaryKey='id';
    public function movies():BelongsTo
    {
        return $this->belongsTo(Movie::class, 'id');
    }
}

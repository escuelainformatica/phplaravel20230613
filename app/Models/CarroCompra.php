<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarroCompra extends Model
{
    use HasFactory;

    protected $table="carrocompras";

    protected $fillable = [
        'idproducto',
        'cantidad',
        'preciounitario',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class,'id');
    }
    // $this->subtotal
    protected function getSubtotalAttribute()
    {
        return $this->cantidad*$this->preciounitario;
    }


}

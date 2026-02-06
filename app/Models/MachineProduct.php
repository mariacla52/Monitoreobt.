<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineProduct extends Model
{
    use HasFactory;
    
    protected $table = 'machine_products';
    
    protected $fillable = [
        'machine_id',
        'product_id',
        'cantidad_actual',
        'cantidad_maxima',
    ];
    
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function updatedByUser()
    {
    return $this->belongsTo(User::class, 'updated_by');
    }
}

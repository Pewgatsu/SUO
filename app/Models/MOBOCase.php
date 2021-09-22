<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOBOCase extends Model
{
    use HasFactory;

    protected $table = 'mobo_cases';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'mobo_form_factor_id'
    ];
}

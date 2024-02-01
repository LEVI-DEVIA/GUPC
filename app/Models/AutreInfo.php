<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutreInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroTf',
        'sectionCadastral',
        'Lotissement',
        'lot',
        'superficie',
        'autreTitre',
        'numActe',
        'dateActe',
    ];
}

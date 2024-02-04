<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationProprietaire extends Model
{
    use HasFactory;
    protected $table = 'informations_proprietaire';
    protected $fillable = [
        'proprietaire',
        'nomGerant',
        'adressePostale',
        'adresseElectronique',
        'tel',
    ];
}

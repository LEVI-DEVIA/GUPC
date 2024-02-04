<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationDemandeur extends Model
{
    use HasFactory;
    protected $table = 'informations_demandeur';
    protected $fillable = [
        'demandeur',
        'adressePostale',
        'tel',
        'typeProprietaire',
    ];
}

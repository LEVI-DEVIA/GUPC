<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationDemande extends Model
{
    use HasFactory;
    protected $table = 'informations_demande';
    protected $guarded = [];

    /*
    protected $fillable = [
        'natureProjet',
        'listeVisage',
        'operationImmobiliere',
        'class',
    ];*/
}

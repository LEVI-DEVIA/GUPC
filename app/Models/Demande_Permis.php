<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_Permis extends Model
{
    use HasFactory;
    
    protected $table = 'demande_permis';

    protected $guarded = [];
    /*
    protected $fillable = [
        'information_sur_la_demande',
        'information_sur_le_proprietaire',
        'document_a_fournir',
        'architect_id',
    ];*/
}

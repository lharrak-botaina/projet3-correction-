<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $table='taches';
    protected $fillable=['id','nomtache','duree','idbrif'];
    public $timestemps=true;

    public function brifs(){
        return $this->belongsTo(Brief::class);
    }
}

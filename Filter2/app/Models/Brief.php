<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    use HasFactory;
    protected $table='briefs';
    protected $fillable=['id','nombrif','dateheurelivraison','dateheurerecupiration'];
    public $timestemps=true;

    public function taches(){
        
        return $this->hasMany(Tache::class);
    }
}

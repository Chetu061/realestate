<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function type(){
        return $this->belongsTo(ProperyType::class,'ptype_id','id');
    }

     public function user(){
        return $this->belongsTo(User::class,'agent_id','id');
    }
    protected $table = 'properties';
    protected $primaryKey = 'id';

}

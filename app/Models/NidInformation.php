<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NidInformation extends Model
{
    use HasFactory;

    public function zilla(){
       return $this->belongsTo(Zilla::class, 'zilla_id', 'id');
    }
    public function upo_zilla(){
        return $this->belongsTo(UpoZilla::class, 'upozilla_id', 'id');
     }
     public function address(){
        return $this->belongsTo(Address::class, 'address_id', 'id');
     }
     public function blood(){
        return $this->belongsTo(BloodGroup::class, 'blood_id', 'id');
     }
}

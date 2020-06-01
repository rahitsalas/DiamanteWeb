<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WH_TransaccionHeader extends Model
{
    protected $table = 'WH_TransaccionHeader';

//    public function b1()
//    {
//        return $this->hasMany('App\WH_TransaccionDetalle', 'CompaniaSocio', 'CompaniaSocio');
//    }
//    public function b2()
//    {
//        return $this->hasMany('App\WH_TransaccionDetalle', 'TipoDocumento', 'TipoDocumento');
//    }
//    public function b3()
//    {
//        return $this->hasMany('App\WH_TransaccionDetalle', 'NumeroDocumento', 'NumeroDocumento');
//    }
//
//    public function getBsAttribute()
//    {
//        $data = collect([$this->b1, $this->b2, $this->b3]);
//        return $data->unique();
//    }

    public function WH_TransaccionDetalle(){
        return $this->hasMany('App\WH_TransaccionDetalle','CompaniaSocio','CompaniaSocio')
            ->where('TipoDocumento',$this->TipoDocumento)
            ->where('NumeroDocumento',$this->NumeroDocumento);

    }
}

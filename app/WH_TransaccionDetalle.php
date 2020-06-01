<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WH_TransaccionDetalle extends Model
{
    protected $table = 'WH_TransaccionDetalle';

    public function WH_TransaccionDetalle(){
        return $this->belongsTo('App\WH_TransaccionDetalle','CompaniaSocio','CompaniaSocio')
            ->where('TipoDocumento',$this->TipoDocumento)
            ->where('NumeroDocumento',$this->NumeroDocumento);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function pedidos()
    {
        $this->belongToMany("App\Pedido");
    }
}

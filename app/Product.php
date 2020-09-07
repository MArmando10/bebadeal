<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','titulo','categoria','condiccion','marca','descripcion','duracion','fechaInicio'
                         ,'fechaFinal','precioFinal','precioReserva','cantidad','Destino','Alto','Ancho','Largo','Peso'];


    public function category(){
        return $this->hasMany(Category::class);
    }

    public function imagenes(){
    	return $this->hasMany(Image::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ofertas() {
        return $this->hasMany(Offers::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

}

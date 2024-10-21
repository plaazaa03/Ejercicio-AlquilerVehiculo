<?php
class Coches {
    public $modelo;
    public $color;
    public $precio;
    public $imagen;

    public function __construct($modelo, $color, $precio, $imagen) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    public function getModelo() {

        return $this->modelo;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getImagen() {
        return $this->imagen;
    }
}

function obtenerCoches($modelo , $color, $precio, $imagen) {
    $coches = [
        new Coches("BMW Serie 5", "Negro", 150, "img/bmw.jpg"),
        new Coches("Toyota RAV4", "Blanco", 120, "img/toyotarav4.avif"),
        new Coches("Tesla Model S", "Rojo", 200, "img/tesla.webp"),
        new Coches("Audi Q5", "Azul", 140, "img/audiQ5.jpeg"),
        new Coches("Ford Mustang", "Naranja", 180, "img/ford.jpg"),
    ];

    return $coches;
}
?>
<?php
class Carro {
    private $marca;
    private $modelo;
    private $ano;

    public function __construct($marca = null, $modelo = null, $ano = null)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function marca(): string 
    {
        return $this->marca;
    }

    public function modelo(): string 
    {
        return $this->modelo;
    }

    public function ano(): int 
    {
        return $this->ano;
    }

    public function abastecer(): string
    {
        return "até 50lts de gasolina";
    }

    public function apresentaCarro() {
        return "O carro a seguir é da marca: " . $this->marca . ", modelo: " . $this->modelo .  ", ano: " . $this->ano . ".";
    }
}
$carro1 = new Carro("Honda", "City", 2020);



?>
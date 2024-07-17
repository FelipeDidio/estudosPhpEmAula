<?php
  include 'Carro.php';

class CarroEletrico extends Carro{
    private $bateria;
    
    public function __construct($marca = null, $modelo = null, $ano = null, $bateria = null)
    {
        parent::__construct($marca, $modelo, $ano);
        $this->bateria = $bateria;
        
    }
    public function abastecer(): string
    {
        return "Abastecer? nada...carrega em casa e partiu ser feliz";
    }

    public function apresentaCarro()
    {
        return parent::apresentaCarro() . "Este carro elétrico possui " . $this->bateria . "KMs de autonimia com sua bateria." ;
    }
}

$carroEletrico1 = new CarroEletrico("Ford", "Focus", 2019, 0);
$carroEletrico2 = new CarroEletrico("HB20S", "sei lá", 2020, 700);

echo $carroEletrico1->apresentaCarro();
echo "<br>";
echo $carroEletrico1->abastecer();
echo "<br>";
echo "<br>";
echo $carroEletrico2->apresentaCarro();
echo "<br>";
echo $carroEletrico2->abastecer();

$carros = [
    new Carro($carro1),
    $carroEletrico1,
    $carroEletrico2
];

foreach($carros as $carro) {
    echo $carro->abastecer();
}
?>
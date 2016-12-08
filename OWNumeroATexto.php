<?php
  class OWNumeroATexto{

    private static $instancia;

    protected $numeros;

    private function __construct() {
      $this->numeros[1] = "uno";
      $this->numeros[2] = "dos";
      $this->numeros[3] = "tres";
      $this->numeros[4] = "cuatro";
      $this->numeros[5] = "cinco";
      $this->numeros[6] = "seis";
      $this->numeros[7] = "siete";
      $this->numeros[8] = "ocho";
      $this->numeros[9] = "nueve";
      $this->numeros[10] = "diez";
      $this->numeros[11] = "once";
      $this->numeros[12] = "doce";
      $this->numeros[13] = "trece";
      $this->numeros[14] = "catorce";
      $this->numeros[15] = "quince";
      $this->numeros[16] = "dieciseis";
      $this->numeros[17] = "diecisiete";
      $this->numeros[18] = "dieciocho";
      $this->numeros[19] = "diecinueve";
      $this->numeros[20] = "veinte";
      $this->numeros[21] = "veintiuno";
      $this->numeros[22] = "veintidos";
      $this->numeros[23] = "veintitres";
      $this->numeros[24] = "veinticuatro";
      $this->numeros[25] = "veinticinco";
      $this->numeros[26] = "veintiseis";
      $this->numeros[27] = "veintisiete";
      $this->numeros[28] = "veintiocho";
      $this->numeros[29] = "veintinueve";
      $this->numeros[30] = "treinta";
      $this->numeros[40] = "cuarenta";
      $this->numeros[50] = "cincuenta";
      $this->numeros[60] = "sesenta";
      $this->numeros[70] = "setenta";
      $this->numeros[80] = "ochenta";
      $this->numeros[90] = "noventa";
      $this->numeros[100] = "ciento";
      $this->numeros[500] = "quinientos";
      $this->numeros[700] = "setecientos";
      $this->numeros[900] = "novecientos";
    }

    public function getInstancia() {

      if(is_null(self::$instancia))
        self::$instancia = new self();

      return self::$instancia;
    }

    public function numeroATexto($num) {

      if($num == 0)
        return "cero";

      //return trim($this->numeroEnMiles($num));
      return trim($this->numeroATextoRecursivo($num, 1000000000));
    }

    private function numeroEnMiles($num){

      if($num < 30)
        return $this->numeros[$num];

      if($num == 100)
        return "cien";

      // rebana todo lo mayor
      $num %= 1000;

      // centenas
      $centenasUnit = floor($num / 100);
      $centenas =  $centenasUnit * 100;
      $centenasStr = $num > 99 ? (isset($this->numeros[$centenas])? $this->numeros[$centenas] : $this->numeros[$centenasUnit] . "cientos") : "";

      // rebajamos las centenas
      $num %= 100;

      if(isset($this->numeros[$num])){

        $restanteStr = " " . $this->numeros[$num];
      } else {

        // agregamos decenas normales
        $decenasUnit = floor($num / 10);
        $decenas =  $decenasUnit * 10;
        $decenasStr = $decenasUnit > 0? " " . $this->numeros[$decenas] : "";

        // determinamos unidades
        $unidades = $num % 10;
        $unidadesStr = $unidades > 0 ? " y " . $this->numeros[$unidades] : "";

        $restanteStr = $decenasStr . $unidadesStr;
      }

      return trim($centenasStr . $restanteStr);
    }

    private function numeroATextoRecursivo($num, $divisor){


      // ya no hay más que dividir
      if($divisor < 1)
        return "";

      $resultado = "";

      // obtener los números para este grupo de miles
      $numeroUnit = floor($num / $divisor);

      if($numeroUnit > 0){

        $enMiles = "";
        if($numeroUnit > 1)
          $enMiles = $this->numeroEnMiles($numeroUnit);

        $finalStr = "";
        if($num >= (1000000000)) {
          $finalStr = "mil";
        } else if($num >= (1000000)){
          if($numeroUnit == 1)
            $finalStr = "un millón";
          else
            $finalStr = "millones";
        } else if($num >= (1000)){
          $finalStr = "mil";
        }

        $resultado = $enMiles . " " . $finalStr;
      }

      return $resultado . " " . $this->numeroATextoRecursivo($num % $divisor, $divisor / 1000);
    }
  }

  function owNumeroATexto($num){
    return OWNumeroATexto::getInstancia()->numeroATexto(floor($num));
  }
?>

<?php

class Azienda{
    public $nome;
    public $sede;
    private $totaleDipendenti=0;
    public static $stipendio_medio_mensile = 1500;
     public static $totale = 0; 
    
    private static $istanze = [];

    function  __construct(string $nome, string $sede , int $totaleDipendenti){
        $this->nome=$nome;
        $this->sede=$sede;
        $this->totaleDipendenti=$totaleDipendenti;
        self::$istanze[] = $this; //ogni volta che istanzo un azienda ne aggiungo uno all'array cosi posso tenerne conto nel conteggio totale 
    }

public function getInfo(){
    echo "l'ufficio $this->nome  con sede  in $this->sede ha ben $this->totaleDipendenti dipendenti"."\n";


}
//metodo  per il totale aggiungendo i parziali di ogni anno
public  function spesaTotaleAdAnnoAttuale(){
   $costo_totale_azienda= self::$stipendio_medio_mensile*$this->totaleDipendenti*12;
   $totaleSingolaAzienda= self::$totale += $costo_totale_azienda;
   echo "Il costo totale parziale all'anno corrente dell'azienda $this->nome è di $totaleSingolaAzienda  Euro" ."\n";;
   

}


public function getSpesaAnnuale() {
    return self::$stipendio_medio_mensile * $this->totaleDipendenti * 12;
}



//spesa totale di tutte le aziende  tendo conto anche di varie istanze 
public static function spesaTutteAziende(){
     
foreach(self::$istanze as $azienda){
   
    self::$totale+=$azienda->getSpesaAnnuale();

}return self::$totale;


}
///facendo questo non avevo un valore corretto
 /*   public static function calcoloTotale()
    {
        return self::$totale;
    }
} */


 

}



$company1= new Azienda('vodafone','ITA',300);
$company2= new Azienda('timIta','ITA',1000);
$company3= new Azienda('Google','USA',20213);
$company4= new Azienda('tuttiIfrutti','ITA',2);
$company5= new Azienda('Bolshoi','RU',123);

$companies=[$company1,$company2,$company3,$company4,$company5];
var_dump($companies);

echo "*************** INFO ***************\n";
foreach ($companies as $azienda) {
    $azienda->getInfo();
}

$company1->getInfo();

echo"***************esercizio 4***** \n";


echo "La spesa annuale dell'azienda " . $company1->nome . " è di " . $company1->getSpesaAnnuale() . " euro \n";


echo"***************esercizio 5***** \n";

$company3->spesaTotaleAdAnnoAttuale();
$company3->spesaTotaleAdAnnoAttuale();
$company3->spesaTotaleAdAnnoAttuale();


echo"***************esercizio 6***** \n";

echo "Spesa totale di tutte le aziende: " . Azienda::spesaTutteAziende() . " €";
echo"***************esercizio      6 bis***** \n";


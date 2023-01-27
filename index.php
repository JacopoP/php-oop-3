<?php

class Stipendio{
    private $mensile;
    private $tredicesima;
    private $quattordicesima;

    public function __construct($mensile, $tredicesima, $quattordicesima){
        $this->SetMensile($mensile);
        $this->SetTredicesima($tredicesima);
        $this->SetQuattordicesima($quattordicesima);
    }

    public function GetMensile(){
        return $this->mensile;
    }
    public function SetMensile($mensile){
        $this->mensile = $mensile;
    }

    public function GetTredicesima(){
        return $this->tredicesima;
    }
    public function SetTredicesima($tredicesima){
        $this->tredicesima = $tredicesima;
    }

    public function GetQuattordicesima(){
        return $this->quattordicesima;
    }
    public function SetQuattordicesima($quattordicesima){
        $this->quattordicesima = $quattordicesima;
    }

    public function GetSalario(){
        return ($this->quattordicesima ? $this->mensile * 14 : ($this->tredicesima ? $this->mensile *13 : $this->mensile * 12));
    }

    public function GetHtml(){
        return ($this->mensile . '<br>'
            .'Tredicesima: ' .($this->tredicesima ? 'Sì' : 'No') .'<br>'
            .'Quattordicesima: ' .($this->quattordicesima ? 'Sì' : 'No') .'<br>'
    );
    }
}
$pippo = new Stipendio(1000, false, false);

echo $pippo->GetHtml();
echo $pippo->GetSalario();

echo '<br><br> ciao';
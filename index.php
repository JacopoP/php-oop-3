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

class Persona {
    private $nome;
    private $cognome;
    private $data_di_nascita;
    private $luogo_di_nascita;
    private $codice_fiscale;

    public function __construct($nome, $cognome, $dat_nasc, $luogo_nasc, $cod_fisc){
        $this->SetNome($nome);
        $this->SetCognome($cognome);
        $this->SetDatNasc($dat_nasc);
        $this->SetLuogoNasc($luogo_nasc);
        $this->SetCodFisc($cod_fisc);
    }

    public function GetNome(){
        return $this->nome;
    }
    public function SetNome($nome){
        $this->nome = $nome;
    }

    public function GetCognome(){
        return $this->cognome;
    }
    public function SetCognome($cognome){
        $this->cognome = $cognome;
    }

    public function GetDatNasc(){
        return $this->data_di_nascita;
    }
    public function SetDatNasc($dat_nasc){
        $this->data_di_nascita = $dat_nasc;
    }

    public function GetLuogoNasc(){
        return $this->luogo_di_nascita;
    }
    public function SetLuogoNasc($luogo_nasc){
        $this->luogo_di_nascita = $luogo_nasc;
    }

    public function GetCodFisc(){
        return $this->codice_fiscale;
    }
    public function SetCodFisc($cod_fisc){
        $this->codice_fiscale = $cod_fisc;
    }

    public function GetHtml(){
        return(
            $this->nome . '<br>'
            .$this->cognome . '<br>'
            .$this->data_di_nascita . '<br>'
            .$this->luogo_di_nascita . '<br>'
            .$this->codice_fiscale . '<br>'
        );
    }
}

class Impiegato extends Persona{
    private $stipendio;
    private $data_di_assunzione;

    public function __construct($nome, $cognome, $dat_nasc, $luogo_nasc, $cod_fisc, Stipendio $stipendio, $data_ass){
        parent:: __construct($nome, $cognome, $dat_nasc, $luogo_nasc, $cod_fisc);
        $this->SetStipendio($stipendio);
        $this->SetDataAss($data_ass);
    }

    public function GetStipendio(){
        return $this->stipendio;
    }
    public function SetStipendio(Stipendio $stipendio){
        $this->stipendio = $stipendio;
    }

    public function GetDataAss(){
        return $this->data_di_assunzione;
    }
    public function SetDataAss($data_ass){
        $this->data_di_assunzione = $data_ass;
    }

    public function GetHtml(){
        return (
            parent:: GetHtml()
            .$this->stipendio->GetHtml()
            .$this->data_di_assunzione . '<br>'
        );
    }
}

$pippo = new Stipendio(1000, false, false);
$pluto = new Persona('pluto', 'paperone', 'un giorno', 'swh', 'ABCDEF...');
$paperino = new Impiegato ('paperino', 'pizza', 'smt', 'BG', 'EFGH...', $pippo, 'ieri');

echo $pippo->GetHtml();
echo ($pippo->GetSalario() . '<br>');
echo $pluto->GetHtml();
echo $paperino->GetHtml();

echo '<br><br> ciao';
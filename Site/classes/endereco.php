<?php
class Endereco{
    private $cep;
    private $estado;
    private $cidade;
    private $bairro;
    private $rua;
    private $numero;
    private $complemento;
    public function __construct($cep, $estado, $cidade, $bairro, $rua, $numero, $complemento){
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
    }
}
?>
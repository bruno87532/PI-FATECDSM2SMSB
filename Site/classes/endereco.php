<?php
class Endereco {
    public $id;
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $rua;
    public $numero;
    public ?string $complemento;

    // Métodos getters
    public function getId() {
        return $this->id;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    // Métodos setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public static function novoEndereco($cep, $estado, $cidade, $bairro, $rua, $numero_casa, $complemento = NULL){
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setEstado($estado);
        $endereco->setCidade($cidade);
        $endereco->setBairro($bairro);
        $endereco->setRua($rua);
        $endereco->setNumero($numero_casa);
        if(isset($rua) && $rua != ""){
            $endereco->setComplemento($complemento);
        }
        $_SESSION["endereco"] = $endereco;
    }
}

<?php

class Conta 
{   
    //propriedades devem ser privadas
    public string $cpfTitular;
    public string $nomeTitular;
    public float $saldo = 0;
    // métodos tem que ser publicos
    public function depositar(float $valorADepositar): void 
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
        } else {
            $this->saldo += $valorADepositar;
        }
    }

    public function sacar(float $valorASacar)
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
        } else {
            $this->saldo -= $valorASacar;
        }
    }
    

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
        } else {
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
        }
    }
    
}

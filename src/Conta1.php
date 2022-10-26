<?php

class Conta 
{   
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;
    }
    // this acessa a instancia
    // para acessar a classe usamos self
    public function deposita(float $valorADepositar): void 
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        } 
        
        $this->saldo += $valorADepositar;
        
    }

    public function saca(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        } 
        
        $this->saldo -= $valorASacar;

    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);

    }
    // métodos que devolvem o valor de um valor de um atributo da classe que precisamos acessar sao chamados de getters
    // metodo gett que devolve o valor de um atributo privado da instancia
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
    // metodo setters que definem um valor em um atributo privado 
    public function defineCpfTitular(string $cpf): void
    {
        $this->cpfTitular = $cpf;
    } 

    public function recuperaCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function defineNomeTitular(string $nome): void
    {
        $this ->nomeTitular = $nome; 
    }

    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }
    
}

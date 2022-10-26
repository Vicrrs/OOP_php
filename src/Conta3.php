<?php

class Conta
{   
    private static $titular;
    private float $saldo;
    private static $numeroDeContas = 0; //atributo da classe sendo inicializado como 0

    // no metodo construtor se deve apenas inicializar a instancia
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;  
        $this->saldo = 0;
        // self chama a classe
        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
   
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

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    } 

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    // para acessar o número de contas criamos um método estático
    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

    
}
<?php

namespace app\helpers;

class Validador
{
    private array $erros = [];

    /**
     * Valida se um campo não está vazio
     */
    public function obrigatorio(string $campo, mixed $valor, ?string $mensagem = null): self
    {
        if (empty($valor) && $valor !== '0') {
            $this->erros[$campo] = $mensagem ?? "O campo {$campo} é obrigatório";
        }
        return $this;
    }

    /**
     * Verifica se há erros
     */
    public function temErros(): bool
    {
        return !empty($this->erros);
    }

    /**
     * Retorna todos os erros
     */
    public function getErros(): array
    {
        return $this->erros;
    }

    /**
     * Limpa os erros
     */
    public function limpar(): self
    {
        $this->erros = [];
        return $this;
    }
}

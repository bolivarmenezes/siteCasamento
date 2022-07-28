<?php

class Guest
{

    private int $id_convidado;
    private string $nome_convidado;
    private string $sobrenome_convidado;
    private string $email_convidado;
    private string $telefone_convidado;
    private string $tipo_convidado;
    private string $observacao_convidado;
    private int $confirmacao_convidado;

    public function getIdConvidado()
    {
        return $this->id_convidado;
    }
    public function getNomeConvidado()
    {
        return $this->nome_convidado;
    }
    public function getSobrenomeConvidado()
    {
        return $this->sobrenome_convidado;
    }
    public function getEmailConvidado()
    {
        return $this->email_convidado;
    }
    public function getTelefoneConvidado()
    {
        return $this->telefone_convidado;
    }
    public function getTipoConvidado()
    {
        return $this->tipo_convidado;
    }
    public function getObservacaoConvidado()
    {
        return $this->observacao_convidado;
    }
    public function getConfirmacaoConvidado()
    {
        return $this->confirmacao_convidado;
    }
    public function setNomeConvidado($nome_convidado)
    {
        $this->nome_convidado = $nome_convidado;
    }
    public function setSobrenomeConvidado($sobrenome_convidado)
    {
        $this->sobrenome_convidado = $sobrenome_convidado;
    }
    public function setEmailConvidado($email_convidado)
    {
        $this->email_convidado = $email_convidado;
    }
    public function setTelefoneConvidado($telefone_convidado)
    {
        $this->telefone_convidado = $telefone_convidado;
    }
    public function setTipoConvidado($tipo_convidado)
    {
        $this->tipo_convidado = $tipo_convidado;
    }
    public function setObservacaoConvidado($observacao_convidado)
    {
        $this->observacao_convidado = $observacao_convidado;
    }
}

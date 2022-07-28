<?php

class Message
{
    private int $idMsg;
    private string $nomeMsg;
    private string $mensagemMsg;
    private string $dataMsg;

/**
* Get the value of nomeMsg
*
* @return  mixed
*/
    public function getNomeMsg()
    {
        return $this->nome_msg;
    }

/**
* Set the value of nomeMsg
*
* @param   mixed  $nomeMsg
*
* @return  self
*/
    public function setNomeMsg($nomeMsg)
    {
        $this->nome_msg = $nomeMsg;
        return $this;
    }

/**
* Get the value of idMsg
*
* @return  mixed
*/
    public function getIdMsg()
    {
        return $this->id_msg;
    }

/**
* Get the value of mensagemMsg
*
* @return  mixed
*/
    public function getMensagemMsg()
    {
        return $this->mensagem_msg;
    }

/**
* Set the value of mensagemMsg
*
* @param   mixed  $mensagemMsg
*
* @return  self
*/
    public function setMensagemMsg($mensagemMsg)
    {
        $this->mensagem_msg = $mensagemMsg;
        return $this;
    }

/**
* Get the value of dataMsg
*
* @return  mixed
*/
    public function getDataMsg()
    {
        return $this->data_msg;
    }

/**
* Set the value of dataMsg
*
* @param   mixed  $dataMsg
*
* @return  self
*/
    public function setDataMsg($dataMsg)
    {
        $this->data_msg = $dataMsg;
        return $this;
    }
}

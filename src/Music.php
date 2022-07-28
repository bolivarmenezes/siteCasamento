<?php

class Music
{
    private int $id_msc;
    private string $nome_msc;
    private string $musica_msc;
    private int $data_msc;

/**
* Get the value of id_msc
*
* @return  mixed
*/
    public function getIdMsc()
    {
        return $this->id_msc;
    }


/**
* Get the value of nome_msc
*
* @return  mixed
*/
    public function getNomeMsc()
    {
        return $this->nome_msc;
    }

/**
* Set the value of nome_msc
*
* @param   mixed  $nome_msc
*
* @return  self
*/
    public function setNomeMsc($nome_msc)
    {
        $this->nome_msc = $nome_msc;
        return $this;
    }

/**
* Get the value of musica_msc
*
* @return  mixed
*/
    public function getMusicaMsc()
    {
        return $this->musica_msc;
    }

/**
* Set the value of musica_msc
*
* @param   mixed  $musica_msc
*
* @return  self
*/
    public function setMusicaMsc($musica_msc)
    {
        $this->musica_msc = $musica_msc;
        return $this;
    }

/**
* Get the value of data_msc
*
* @return  mixed
*/
    public function getDataMsc()
    {
        return $this->data_msc;
    }
}

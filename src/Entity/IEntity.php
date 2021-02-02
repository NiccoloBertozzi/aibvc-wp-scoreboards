<?php


namespace AIBVCS\Entity;


interface IEntity
{
    /**
     * Build entity from data.
     * @param array $data
     * @return IEntity
     */
    public function buildFrom($data);
}
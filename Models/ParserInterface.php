<?php


interface ParserInterface
{
    /**
     * @return array|null
     */
    public function parse(): ?array;
}
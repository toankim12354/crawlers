<?php
namespace Crawlers\Models;

interface ParserInterface
{

    public function initData(array $data);

    /**
     * @return array|null
     */
    public function parse(): ?array;
}
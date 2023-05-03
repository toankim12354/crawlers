<?php
namespace Global\Singleton;
use Crawlers\Factories\ParserFactory;

class Singleton
{
    public static function getInstance(string $name)
    {
      switch ($name) {
          case 'factory':  return new ParserFactory();
          case 'dabase':  return new Database();
      }

    }
}

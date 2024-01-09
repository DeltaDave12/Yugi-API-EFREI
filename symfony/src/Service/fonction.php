<?php
namespace App\Service;

class ConsoleWriterService {
  //Console.log pour PHP
  function write_to_console($data) {
    $console = 'console.log(' . json_encode($data) . ');';
    $console = sprintf('<script>%s</script>', $console);
    echo $console;
  }
}

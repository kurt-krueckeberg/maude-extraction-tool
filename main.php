#!/usr/bin/php
<?php
use Maude\Registry as Registry;

require_once("class_loader.php");

boot_strap();

function copy_if(SplFileObjectEx $file_iter, DBInsertIterator $db_iter,  lambda/closure)
{
  foreach ($fileiter as $vec) {

        if ($vec is new) {


        } 
  }
}

try {
      
   $db_settings = Registry::registry('database');
   
   $db_handle = new \PDO("mysql:host=localhost;dbname=" . $db_settings['dbname'],
                         $db_settings['dbuser'],
                         $db_settings['dbpasswd']);  
   
  $db_handle->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );  

  $file_handlers = Registry::registry('file_handlers'); 

  foreach(Registry::registry('file_names') as $file_type => $file_name) {
 
    // TODO: Change to use .xml fie and SimpleXML

    $className = "Maude\\" .  $file_handlers[$file_type]; 
        
    $databaseInserter = new $className($file_name, $db_handle);

    $file_iterator = new SplFileObjectEx($file_name);
  
    copy_if($file_iterator, $datatbaseInserter, lamba_closure {} );

  }

  echo "\nupdateDatabase() complete\n"; // debug

} catch (Exception $e) {

   $errors = "\nException Thrown in " . $e->getFile() . " at line " . $e->getLine() . "\n";
      
   $errors .= "Stack Trace as string:\n" . $e->getTraceAsString() . "\n";
          
   $errors .= "Error message is: " .   $e->getMessage() . "\n";
      
   echo $errors;

} // end try


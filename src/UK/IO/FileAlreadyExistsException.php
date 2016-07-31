<?php
/**
 * In this file the class '\UK\IO\FileAlreadyExistsException' is defined.
 *
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @package        UK\IO
 * @since          2016-07-28
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace UK\IO;


/**
 * This class defines a exception, thrown if a file already exists but it should not exist.
 *
 * It extends from {@see \UK\IO\Exception}.
 *
 * @since v0.1
 */
class FileAlreadyExistsException extends IOException
{


   # <editor-fold desc="= = =   C O N S T R U C T O R   +   D E S T R U C T O R   = = = = = = = = = = = = = = =">

   /**
    * Init's a new instance.
    *
    * @param string     $file     The already existing file
    * @param string     $message  The optional error message
    * @param integer    $code     The optional error code (Default to \E_USER_ERROR)
    * @param \Exception $previous A optional previous exception
    */
   public function __construct(
      string $file, string $message = null, $code = \E_USER_ERROR, \Exception $previous = null )
   {
      parent::__construct(
         $file,
         'The File does already exist.' . static::appendMessage( $message ),
         $code,
         $previous
      );
   }

   # </editor-fold>


}


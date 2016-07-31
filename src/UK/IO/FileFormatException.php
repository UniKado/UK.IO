<?php
/**
 * In this file the class '\UK\IO\FileFormatException' is defined.
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
 * This exception should be used if a accessed file contains a wrong/bad format.
 *
 * The class extends from {@see \UK\IO\Exception}.
 *
 * @since v0.1
 */
class FileFormatException extends IOException
{


   # <editor-fold desc="= = =   C O N S T R U C T O R   +   D E S T R U C T O R   = = = = = = = = = = = = = = =">

   /**
    * Init's a new instance
    *
    * @param string     $file     The bad formatted file.
    * @param string     $message  The optional error message
    * @param int        $code     The optional error code (Default to \E_USER_ERROR)
    * @param \Exception $previous A optional previous exception
    */
   public function __construct(
      string $file, string $message = null, $code = \E_USER_ERROR, \Exception $previous = null )
   {

      parent::__construct(
         $file,
         'File format is wrong or illegal.' . static::appendMessage( $message ),
         $code,
         $previous
      );

   }

   # </editor-fold>


}


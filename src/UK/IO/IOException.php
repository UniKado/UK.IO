<?php
/**
 * In this file the class '\UK\IO\IOException' is defined.
 *
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @package        UK\IO
 * @since          2016-07-28
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace UK\IO;


use \UK\Exception as UKException;


/**
 * This class defines a exception, used as base exception of all IO exceptions.
 *
 * It extends from {@see \UK\Exception}.
 *
 * @since v0.1
 */
class IOException extends UKException
{


   # <editor-fold desc="= = =   P R O T E C T E D   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = =">"

   protected $path;

   # </editor-fold>


   # <editor-fold desc="= = =   C O N S T R U C T O R   +   D E S T R U C T O R   = = = = = = = = = = = = = = =">

   /**
    * Init's a new instance.
    *
    * @param string         $path     The path, associated with the error.
    * @param string         $message  A optional error message.
    * @param integer        $code     The optional error code (Defaults to \E_USER_ERROR)
    * @param \Exception     $previous A optional previous exception
    */
   public function __construct( string $path, string $message = null, $code = 256, \Exception $previous = null )
   {
      parent::__construct(
         \sprintf( 'There was a error with path [%s]!', $path ) . static::appendMessage( $message ),
         $code,
         $previous
      );
      $this->path = $path;
   }

   # </editor-fold>


   # <editor-fold desc="= = =   G E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Returns the path that was error depending.
    *
    * @return string
    */
   public final function getPath() : string
   {
       return $this->path;
   }

   # </editor-fold>


}


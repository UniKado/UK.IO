<?php
/**
 * In this file the class '\UK\IO\Path' is defined.
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
 * A static path helper class
 *
 * @since      v0.1
 */
abstract class Path
{


   # <editor-fold desc="= = =   P U B L I C   S T A T I C   F I E L D S   = = = = = = = = = = = = = = = = = = =">

   /**
    * This directory separator is not used by current system.
    *
    * @var string
    */
   public static $NoFolderSeparator;

   # </editor-fold>


   # <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * Combine 2 or 3 path elements to a single path and returns it.
    *
    * @param  string   $basePath The base path.
    * @param  string[] $next     The next path parts.
    * @return string
    */
   public static function Combine( string $basePath, string ...$next ) : string
   {

      if ( count( $next ) < 1 )
      {
         return rtrim( $basePath, "\r\n\t /\\" );
      }

      // Remove leading and trailing directory separators + spaces from the next items
      \array_walk( $next, function( &$item ) { $item = \trim( $item, '/\\ ' ); } );

      return \rtrim(
         \rtrim( $basePath, "\r\n\t /\\" )
            . \DIRECTORY_SEPARATOR
            . \join( DIRECTORY_SEPARATOR, $next ),
         '/\\'
      );

   }

   /**
    * Normalizes a path to directory separators, used by current system.
    *
    * @param  string $path
    * @return string
    */
   public static function Normalize( string $path ) : string
   {

      if ( empty( static::$NoFolderSeparator ) )
      {
         static::$NoFolderSeparator = File::IS_WIN ? '/' : '\\';
      }

      $tmpPath = ( File::IS_WIN
         ? \trim(
            \str_replace(
               static::$NoFolderSeparator,
               \DIRECTORY_SEPARATOR,
               $path
            ),
            \DIRECTORY_SEPARATOR
         )
         : \rtrim(
            \str_replace(
               static::$NoFolderSeparator,
               \DIRECTORY_SEPARATOR,
               $path
            ),
            \DIRECTORY_SEPARATOR
         )
      );

      // return the resulting path and replace /./ or \.\ with a single directory separator
      return str_replace(
         \DIRECTORY_SEPARATOR . '.' . \DIRECTORY_SEPARATOR,
         \DIRECTORY_SEPARATOR,
         $tmpPath
      );

   }

   /**
    * Returns if the defined path is a absolute path definition.
    *
    * @param  string  $path
    * @param  boolean $dependToOS
    * @return boolean
    */
   public static function IsAbsolute( string $path = null, bool $dependToOS = true ) : bool
   {

      if ( \is_null( $path ) || \strlen( $path ) < 1 )
      {
         return false;
      }

      if ( $dependToOS )
      {

         if ( ! File::IS_WIN )
         {
            return $path[ 0 ] == '/';
         }

         if ( \strlen( $path ) < 2 )
         {
            return false;
         }

         return $path[ 1 ] == ':' || ( $path[ 0 ] == '\\' && $path[ 1 ] == '\\' );

      }

      return $path[ 0 ] == '/' || $path[ 1 ] == ':' || ( $path[ 0 ] == '\\' && $path[ 1 ] == '\\' );

   }

   /**
    * Switches als windows directory separator (backslashes) to unix like (slashes)
    *
    * @param  string $path
    * @return string
    */
   public static function Unixize( string $path = null ) : string
   {

      if ( \is_null( $path ) )
      {
         return '';
      }

      return \str_replace( '\\', '/', $path );

   }

   /**
    * Removes the current working directory from defined path, if it starts with it.
    *
    * @param  string $path
    * @return string
    */
   public static function RemoveWorkingDir( string $path = null ) : string
   {

      if ( \is_null( $path ) )
      {
         return '';
      }

      $wd = '~^' . \preg_quote( static::Unixize( \getcwd() ) . '/' ) . '~';

      return \preg_replace( $wd, '', static::Unixize( $path ) );

   }

   # </editor-fold>


}


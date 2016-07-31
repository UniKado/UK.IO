<?php

/**
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @since          2016-07-29
 * @version        0.1.0
 */
class FolderTest extends PHPUnit_Framework_TestCase
{

   protected function tearDown()
   {
      \UK\IO\Folder::Delete( __DIR__ . '/tmp/test5' );
      parent::tearDown();
   }

   public function setUp()
   {
      \UK\IO\Folder::Create( __DIR__ . '/tmp/test5' );
   }

   public function testUp()
   {
      $this->assertEquals( '/foo/bar', \UK\IO\Folder::Up( '/foo/bar/baz' ), 'Folder::Up() Test 1' );
      $this->assertEquals( '/foo/bar/', \UK\IO\Folder::Up( '/foo/bar/baz', 1, '/' ), 'Folder::Up() Test 2' );
      $this->assertEquals( '/foo', \UK\IO\Folder::Up( '/foo/bar/baz', 2 ), 'Folder::Up() Test 3' );
      $this->assertEquals( '/', \UK\IO\Folder::Up( '/foo/bar/baz', 3 ), 'Folder::Up() Test 4' );
      $this->assertEquals( '/', \UK\IO\Folder::Up( '/foo/bar/baz', 4 ), 'Folder::Up() Test 5' );
      $this->assertEquals( '', \UK\IO\Folder::Up( '', 10 ), 'Folder::Up() Test 6' );
      $this->assertEquals( '/', \UK\IO\Folder::Up( '', 10, '/' ), 'Folder::Up() Test 7' );
   }

   public function testGetFirstExisting()
   {
      $this->assertEquals( __DIR__, \UK\IO\Folder::GetFirstExisting( __DIR__ . '/foo/bar' ), 'Folder::GetFirstExisting() Test 1' );
      $this->assertEquals( __DIR__ . '/tmp/test1', \UK\IO\Folder::GetFirstExisting( __DIR__ . '/tmp/test1/foo/bar' ), 'Folder::Up() Test 2' );
      $this->assertEquals( __DIR__ . '/tmp/test1', \UK\IO\Folder::GetFirstExisting( __DIR__ . '/tmp\\test1/foo/bar' ), 'Folder::Up() Test 3' );
   }

   public function testCanCreate()
   {
      $this->assertTrue( \UK\IO\Folder::CanCreate( __DIR__ . '/tmp/test3' ), 'Folder::CanCreate() Test 1' );
      $this->assertFalse( \UK\IO\Folder::CanCreate( __DIR__ . '/tmp/test1' ), 'Folder::CanCreate() Test 2' );
      $this->assertFalse( \UK\IO\Folder::CanCreate( '/var/log/foobar' ), 'Folder::CanCreate() Test 3' );
   }

   /**
    * @expectedException UK\IO\IOException
    */
   public function testCreate1()
   {
      \UK\IO\Folder::Create( '/var/log/foobar' );
   }

   /**
    * @expectedException UK\IO\IOException
    */
   public function testCreate2()
   {
      \UK\IO\Folder::Create( '' );
   }

   public function testCreate3()
   {
      \UK\IO\Folder::Create( __DIR__ . '/tmp/test4' );
      $this->assertTrue( true, 'Folder::Create() Test 2-try' );
   }

   public function testDelete()
   {

      try
      {
         \UK\IO\Folder::Delete( __DIR__ . '/tmp/test5' );
         $this->assertTrue( true, 'Folder::Delete() Test 1-try' );
      }
      catch ( \UK\PhpException $ex )
      {
         $this->assertTrue( false, 'Folder::Delete() Test 1-catch' );
      }

   }

   public function testListAllFiles()
   {
      $this->assertEquals( [], \UK\IO\Folder::ListAllFiles( __DIR__ . '/tmp/test1', false ), 'Folder::ListAllFiles() Test 1' );
      $required = [
         __DIR__ . '/tmp/test1/test11/test11.txt',
         __DIR__ . '/tmp/test1/test12/test121/test121.txt'
      ];
      $this->assertEquals( $required, \UK\IO\Folder::ListAllFiles( __DIR__ . '/tmp/test1', true ), 'Folder::ListAllFiles() Test 1' );

   }

   public function testGetRealPath()
   {

   }

   public function testClear()
   {

   }

   public function testMove()
   {

   }

   public function testMoveContents()
   {

   }

   public function testCopy()
   {

   }

   public function testZip()
   {

   }/**/

}

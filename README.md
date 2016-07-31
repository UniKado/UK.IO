# UK.IO

The UniKado IO lib.

```bash
composer require uk/io
```

or include it inside you're composer.json

```json
{
   "require": {
      "php": ">=7.0",
      "uk/io": "^0.1.0"
   }
}
```

The library declares the 3 main classes:

* `UK\IO\Path` Some static Path helping methods
* `UK\IO\File` FIle handling class
* `UK\IO\Folder` Some static Folder/Directory helping methods

and the helper class

* `UK\IO\MimeTypeTool`


and last but not least the following exceptions:

* `UK\IO\IOException`
* `UK\IO\FileAccessException`
* `UK\IO\FileAllreadyExistsException`
* `UK\IO\FileFormatException`
* `UK\IO\FileNotFoundException`
* `UK\IO\FolderAccessException`
* `UK\IO\FolderNotFoundException`
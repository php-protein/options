<p align=center><img height=150 src="https://raw.githubusercontent.com/php-protein/docs/master/assets/protein-large.png"></p>

# Protein | Options
## A dictionary to handle application-wide options

### Install
---

```
composer require proteins/options
```

Require the global class via :

```php
use Proteins\Option;
```
or the include the trait in your classes via :

```php
use Proteins\Options;

class MyClass {
    use Options;
}
```

### Loading a config file

You can load a config tree from a file or an array via the utility loaders methods : 

| Method | Description |
|--------|-------------|
| `loadArray` | Load directly an array of key->values |
| `loadPHP`   | Load array key->values from a PHP file returning it. |
| `loadINI`   | Load values from an `.ini` file. |
| `loadJSON`  | Load JSON key->value map. |
| `loadENV`   | Load environment variables from a .env file. |

#### Loading options from file or array

```php
Option::loadPHP('config.php');
```

**config.php**

```php
<?php
return [
  "debug" => false,
  "cache" => [
    "enabled" => true,
  	"driver"  => "files",
  	"path"    => "/tmp/cache", 
  ], 
];
```

#### Loading Options and Environment from a .env file

```php
Option::loadENV($dir,$envname='.env',$prefix_path=null)
```

**/index.php**

```php
Option::loadENV(__DIR__);

print_r( Option::all() );
```

**/.env**

```bash
# This is a comment
BASE_DIR="/var/webroot/project-root"
CACHE_DIR="${BASE_DIR}/cache"
TMP_DIR="${BASE_DIR}/tmp"
```

**Result:**

```php
Array
(
    [BASE_DIR] => /var/webroot/project-root
    [CACHE_DIR] => /var/webroot/project-root/cache
    [TMP_DIR] => /var/webroot/project-root/tmp
)
```

# LegacyDbz

10-15 metų(~2014m) WAP DBZ skriptas pradėtas kurti kūrėjo **Jomajo**, vėliau buvo pasklidęs WAP'e ir daugiau žinomas kaip vegita.us.lt sc.
Pirmą kartą šį skriptą pamačiau 2020m.
Kol skriptas atkeliavo iki manęs perėjo per daug WAP programuotojų rankų, kiekvienas jų keitė jį kaip sugalvodavo.
2025 pradėjau daryti technologinį upgrade šiam skriptui.

Ką pavyko atnaujinti:

* mysql_query -> (mysqli_query, **PDO**)
* PHP version: 5.6 -> **8.4**
* composer autoload(for **src** directory)
* **.env** file support
* logging(**monolog**)
* Carbon support
* Guzzle HTTP client support

## Installation

```bash
composer install
```

## Usage

create .env file from .env.example

for database queries use: `\LegacyDbz\Core\Db`

for logging: 
```php
\LegacyDbz\Core\Logger::logError('test', ['test' => 'test']);

logError('test', ['test' => 'test']);
```

collections:
```php
use LegacyDbz\Core\Collection
```

get current player(logged user)
```php
use LegacyDbz\Players\Services\CurrentPlayer;

$player = CurrentPlayer::get();
$player = currentPlayer();
```

simple active record solution:
```php
use LegacyDbz\Core\Model

class Dungeon extends Model
{
    protected string $table = 'dungeons';
}
```

instead of var_dump and die use:
```php
dd();
```

instead of new DateTime() use:

```php
$currentDateTime = now();
```

## External integrations

* wapgames.lt referral link
* wapgames.lt news import
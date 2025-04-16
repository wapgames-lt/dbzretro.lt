# LegacyDbz

10-15 metų(~2014m) WAP DBZ skriptas pradėtas kurti kūrėjo **Jomajo**(discord: jomajo0601), vėliau buvo pasklidęs WAP'e ir daugiau žinomas kaip vegita.us.lt sc.
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

logInfo('info', ['info' => 'info']);
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
dd($data);
```

instead of new DateTime() use:

```php
$currentDateTime = now();
```

## External integrations

- **wapgames.lt**(set your WAP_GAMES_API_KEY and WAP_GAMES_SITE_UUID variables in .env)
    - referral link
    - news import

- **discord** webhook support (set your DISCORD_WEBHOOK_URL and DISCORD_USERNAME variables in .env)
    - send a Discord message to the channel using the function:
     ` sendDiscordMessage($message);`
  
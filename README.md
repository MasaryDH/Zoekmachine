# Zoekmachine Offices D&G

### Algemeen
start server (console)
```
php bin/console server:run
```
##
Er zijn al enkele steden toegevoegd onder andere: Gent, Brugge, Antwerpen, Brussel, Hasselt, Kontich, Leuven, Luik, Bergen, Aarlen, Namen en Waver. 
Maar er kunen gemakkelijk steden toegevoegd worden in de ZoekmachineController.php


### Doctrine
Edit DATABASE_URL in .env to use your own database

## NOTITIES

- How to get Entity class with an already existing database: https://symfony.com/doc/current/doctrine/reverse_engineering.html
- error: enum requested   - https://stackoverflow.com/questions/54547906/unknown-database-type-enum-requested-doctrine-dbal-platforms-mysql57platform-ma

### Symfony|notities
- {{ }} say something tag (because it prints)
- {% %} do something tag
- {# #} comments
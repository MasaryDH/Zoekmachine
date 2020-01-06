# Zoekmachine Offices D&G

### Algemeen
start server (console)
```
php bin/console server:run
```
##
- Er zijn al enkele steden en gemeenten toegevoegd onder andere: **Gent, Brugge, Antwerpen, Brussel, Hasselt, Kontich, Leuven, Luik, Bergen, Aarlen, Namen en Waver.** 
Maar er kunnen gemakkelijk steden toegevoegd worden in de ZoekmachineController.php

- Dit kan uitgebreid worden door middel van een **webservice API** zoals Geonames, Google Maps, Bing, ...

- In het mapje **"Screenshots"** bevinden zich voorbeelden van hoe de zoekmachine eruit ziet

- **Checkboxen** zijn toegevoegd maar zijn **nog niet actief**
##

### Doctrine
**Edit DATABASE_URL in .env to use your own database**

## ENKELE NOTITIES

- How to get Entity class with an already existing database: https://symfony.com/doc/current/doctrine/reverse_engineering.html
- error: enum requested   - https://stackoverflow.com/questions/54547906/unknown-database-type-enum-requested-doctrine-dbal-platforms-mysql57platform-ma
- README.md writing anf formatting: https://help.github.com/en/github/writing-on-github/basic-writing-and-formatting-syntax 

### Symfony|notities
- **{{ }}** say something tag (because it prints)
- **{% %}** do something tag
- **{# #}** comments
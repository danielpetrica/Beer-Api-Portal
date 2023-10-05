# Beer api portal

## Prima installazione

Usare il seguente commando per installare le dipendenze iniziali

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Aviare sail 
```bash
./vendor/bin/sail up -d 
```

Copiare il file .env.example in .env e configurare le variabili d'ambiente

Eseguire il comando per generare la chiave di cifratura

```
./vendor/bin/sail artisan key:generate
```

Installare le dipendenze javascript
```
./vendor/bin/sail npm install
```

Compilare i file javascript
```
./vendor/bin/sail npm run dev
```

Eseguire le migrazioni del database
```
./vendor/bin/sail artisan migrate
```

## Uso laravel sail
Il progetto utilizza laravel sail per fornire gli ambienti di sviluppo e test.

Usare laravel sail per tutti i comandi laravel e per avviare l'ambiente di sviluppo

### Comando avviamento ambiente di sviluppo
```bash
./vendor/bin/sail up -d 
```

### Comando stop ambiente di sviluppo
```bash 
./vendor/bin/sail down
``` 
### Comando per eseguire i test
```bash
./vendor/bin/sail test
```

### Comando per eseguire i test con coverage
```bash
./vendor/bin/sail test --coverage
```
### Eseguire qualsiasi comando artisan con sail
```bash
./vendor/bin/sail artisan <comando>
```

## Considerazioni generali
Il progetto è stato pensato per essere facilmente estendibile. 
Per velocizzare il sviluppo e aumentare la stabilita si è scelto di stare sulle spalle dei
giganti e utilizzando pacchetti progettati per laravel sia per il scafolding del'interfaccia
e delle api sia per la gestione del client api verso punkapi.

L'api utilizzata è https://punkapi.com/

## Account utente

L'utente puo essere creato in autonomia tramite la registrazione a interfaccia web. 


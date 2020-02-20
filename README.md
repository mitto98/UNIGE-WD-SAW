# UniGe Opinioni

Sistema di raccoglimento delle opinioni degli studenti sui corsi dell'Università degli studi di Genova

I TEST SONO DISPONIBILI SU [http://opinioni.unigee.it/test.html](http://opinioni.unigee.it/test.html)


## Funzionalità imlementate
### Ricerca

Per quanto riguarda la ricerca la abbiamo implementata in due punti:
- Ricerca chat: per effettuare la ricerca degli utenti
- Ricerca corsi: nella home per ricercare i corsi

Entrambe sono state implementate in javascript, ma al fine di soddisfare i requisiti dei test abbiamo implementato un endpoint php che effettua la ricerca dei corsi.

### Funzionalità a scelta
Tra le funzionalità a scelta abbiamo implementato:
- Newsletter: periodicamente un cronjob effettua una chiamata ad un endpoint che invia a tutti gli utenti registrati gli ultimi commenti rilasciati
- Chat interna: consente di comunicare tra i vari utenti e si aggiorna in automatico


## Tecnologie utilizzate

### Struttura Back-end
Per la parte di back-end abbiamo deciso di utilizzare Laravel, un framework php molto diffuso che consente di scriverecodice facilmente manutenibile.  
Laravel è basato sulla struttur MVC e, oltre al sistema di migrazioni e popolamento database, fornisce un ORM (Eloquent)  e un avanzato sistema di gestione delle notifiche e dei template.

### Struttura Front-end
Per il front-end abbiamo deciso di utilizzare Vue, un framework per la creazione di componenti js (come React o Angular).  
Vue ci ha consentito di realizzare una SPA (Single Page Application) reattiva e di utilizzare il back-end esclusivamente come middleware con il DB, che sarà riutilizzabile anche per lo sviluppo di un'ipotetica applicazione mobile o per una "lavagna" appendibile nei dipartimenti, senza che sia necessario apportare modifiche all'applicazione.  
Per il mantenimento dei dati abbiamo anche utilizzato uno state manager (vuex), questo ci ha consentito di ridurre le richieste al back-end e di mantenere dati tra le diverse pagine del sito.  

### Database
![alt text](./uml_database.png)
Per la generazione del database abbiamo utilizzato il gestore di migrazioni di laravel.  
I campi sono stati popolati con il sistema di seeder di laravel in due modi diversi:  
- Le aree e i corsi sono state popolati a partire da un file JSON di cui abbiamo fatto il parsing con php. Successivamente  grazie ad Eloquent abbiamo inserito questi dati sul DB.  
- Utenti (fatta eccezione per i nostri) e corsi sono stati generati in maniera casuale utilizzando il pacchetto `faker` di `fzaninotto` 

### CI e CD
Per lo sviluppo di questo progetto abbiamo deciso di implementare un server di continous integration che si occupa di compilare gli assets javascript del progetto e di creare il container docker e, successivamente, di caricarlo sul server.
In un ipotetico futuro sarebbe possibile integrare un ambiente di produzione su cui venga effettuato il deploy solo dopo una conferma manuale sul pannello di gitlab e, prima di effettuare l'aggiornamento del container, fare un dump del database.

### Autenticazione
Per la gestione dell'autenticazione abbiamo deciso di utilizzare `laravel passport`, un wrapper ti `oauth2 server'` sviluppato da `the php league`.  
Noi utilizziamo una password grant token, che consente di effettuare l'autenticazione inviando la password direttamente al server nel corpo di una richiesta post, purtroppo non siamo riusciti a configurare un certificato ssl con Let'sEncrypt sul server a causa della complessità del reverse proxy che usiamo (traefik).  

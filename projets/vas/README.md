# Reprise du flambeau
En vue que je ne sais pas par avance le niveau d'expertise du repreneur du flambeau (pour cause de non voyance dans le futur). J'ai fait quelques petites notes pour mieux comprendre le projet.
## Quelques aides pour comprendre le site
- [Cahier des charges](#cahier-des-charges)
- [Architecture du site](#architecture-du-site)
- [Conception du site](#conception)

# Cahier des charges
## Présentation du projet
### Contexte
L’Association VAS souhaiterait mettre en place une solution applicative et informationnelle pour communiquer/partager des documents entre les parents et les personnels. De pouvoir présenter différentes informations sur l’association ainsi que de ces différentes entités et antennes.

## Spécifications
La solution doit permettre de :
-	Consulter les différents centres
    -	Dans le cas échéant, ces différentes antennes
-	Pouvoir communiquer et partager des documents avec des parents d’élèves
-	Administrer les données informatives sur les différents centres et antennes.
-	Si plus : spécifier

### Liste des fonctionnalité
-	Identifier les personnes qui se connectent :
    - Par types d’utilisateurs :
      - Personnels Administratifs :
        - Consulter et modifier le site « informatif » ainsi que le « Blog Actus »
        - Administrer les utilisateurs
      - Parents d’élèves :
        - Consulter le site « informatif » (aucune action demandé) ainsi que le « Blog Actus »
      - Anonymes :
        - Consulter le site « informatif » (aucune action demandé)
    - Posséder un « Blog Actus » qui recensent l’actualité quotidienne/hebdomadaire de l’Association.
- Si plus : spécifier

### Contraintes techniques
- A spécifier

# Architecture du site
```mermaid
graph TD
    VAS(VAS) --> P(Presentation)
    VAS --> V(Valeurs)
    VAS --> H(Histoire)
    VAS --> B(Blog)

    VAS --> CAES(CAES)
        CAES --> PCAES(Presentation)
        CAES --> VCAES(Valeurs)
        CAES --> HCAES(Histoire)
        CAES --> SCAES(Service à domicile)
            SCAES --> SESSAD(SESSAD)
        CAES --> CCAES(Conseil d'admin)
        CAES --> HRCAES(Handicap Rare)
        CAES --> VQ(Vie Quotidienne)
            VQ --> HORAIRE(Horaires)
            VQ --> CALENDRIER(Calendrier)
            VQ --> MENU(Menus)

    VAS --> CMPP(CMPP)
        CMPP --> PCMPP(Presentation)
        CMPP --> VCMPP(Valeurs)
        CMPP --> HCMPP(Histoire)

    VAS --> CAMSP(CAMSP)
        CAMSP --> PCAMSP(Presentation)
        CAMSP --> VCAMSP(Valeurs)
        CAMSP --> HCAMSP(Histoire)
```

# Conception
## Gestions des données SQL
### Utilisateurs
Deux utilisateurs ont été créé un public et un admin :
- L'utilisateur public peut uniquement `SELECT`.
- L'utilisateur admin peut `SELECT UPDATE INSERT DELETE FILE`

Les identifiants présent dans le fichier [.env.example](.env.example) servent à la connexion à la BDD.
> Note :
> Le fichier [.env.example](.env.example) est un exemple. Pour que ce soit fonctionnelle il faudra créer un fichier [.env](.env) avec les identifiants propre à la connexion.

L'utilisation de l'utilisateur admin peut se faire si et seulement si l'utilisateur connecter est administrateur. Sinon il continue sous le l'utilisateur public.

### Base de données
Le SQL (vierge) de la BDD peut ce retrouver ici : [VAS_BDD](db/VAS_BDD.sql)
Et voici son MCD (Modèle Conceptuel des Données)
![VAS_BDD](db/VAS_BDD.png)

Et si vous utilisez looping pour modifier le MCD :
[VAS_BDD](db/VAS_BDD.loo)

## Langage
### PHP
Le site est codé en PHP sous le modèle MVC (Modèle/Vue/Controleur).

### JS
J'ai inclu la librairie jQuery par défaut car il facilite grandement l'utilisation du JS côté client. Le fichier principal est [app](js/app.js).

### CSS
Gérer avec Bootstrap avec quelques modifications apporté dans [styles.css](css/styles.css)

## Autres
### Fichiers .htaccess
Chaques dossier à son fichier .htaccess, c'est un fichier de configuration pour Apache2.

### Fichiers robots.txt
Ces fichiers évites que ces sous-dossiers se font référencé sur les navigateurs par les robots de Google et autres.

# Recommendations
Il serait intéressant de re-codé le site avec Dart et son Framework Flutter ou avec un Firework JS comme Svelte ou VueJS sous serveur ViteJS. Ce n'est pas très important en soit, c'est juste par soucis de "modernisme".

Si vous souhaitez vous aventuré dans le Flutter (déjà bon courage). Flutter est un framework de développement d’applications multiplateforme, c'est-à-dire qu'il re-compile le code Dart dans le langage natif de la plateforme ciblé :
- Android => Kotlin
- Windows => C
- iOS => Swift

C'est ce qui en fait un langage très performant, mais le typage du langage est d'après mon ressentit, pas du tout intuitive et complexe.

Si vous souhaitez vous aventuré avec un framework JS tel que Svelte (que je recommande) est la possibilité de concervé pas mal de fichier PHP (pas en tant que tel mais dans sa manière de fonctionné). De plus, Svelte est très prometteur alors qu'il en ai que à ces débuts (à l'heure ou j'écris ces lignes).

# TODO
## VAS
- Présentation
- Histoire
- Valeurs
- Vos Droits
- FAQ
- FSE
- Groupes D'expressions
- Contact
  - Envoie du mail à ???
- Blog actus
## Plus tard
- Accessibilité malvoyants & malentendants (Augmentation / réduction taille de police, contraste élevé, Texte to Speech)

# Connection
## Identifiant
- nom : BenjaminVAS08
- token : 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
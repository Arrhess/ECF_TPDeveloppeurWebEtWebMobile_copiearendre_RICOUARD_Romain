## ÉVALUATION EN COURS DE FORMATION 
TP – Developpeur Web et Web Mobile 👋

## Énoncé

**Votre examen comporte :**

✔ Cet énoncé qui vous présente le sujet de l’épreuve

✔ Une copie à rendre (Excel ou Word) que vous devez télécharger, remplir informatiquement et déposer dans l’espace de dépôt prévu à cet effet. 

Renommer votre copie à rendre Word ou Excel comme suit : ECF_TPDeveloppeurWebEtWebMobile_copiearendre_NOM_Prenom

# Objectifs de l’évaluation : 

L’évaluation en cours de formation que vous allez réaliser a pour vocation de figurer dans votre livret d’évaluation. Il sera donc remis à votre jury le jour des épreuves du titre professionnel accompagné de votre évaluation et du sujet initial. 
Nous vous demandons de vous mettre en situation d’examen. Prenez le temps de lire le sujet et de manipuler les annexes afin de répondre en situation professionnelle aux questions et problématiques évoquées dans le sujet.

## À vous de jouer ! 

## Informations

**Github** : (https://github.com/Arrhess/ECF_TPDeveloppeurWebEtWebMobile_copiearendre_RICOUARD_Romain)

**Démonstration** : <span style="color:red">**url du site**</span>

    Adresse email démo      : admin@viteetgourmand.fr
    Mot de passe démo       : admin


## Réflexion et configuration de l'environement de travail

**Résumé du besoin et choix des technologies**

Les deux Associés, Julie et José, on besoin d'avoir un site leur permettant d'avoir plus de visibilité pour leur societé, mais également pour permettre aux clients de passer leurs commandes de manières rapide et simple.

Les associés ont besoin de sécuriser l'accès aux modifications des données, et d'attribuer 3 rôles: L'administrateur, ses employés, et les visiteurs du site.

Julie José ont besoin de montrer leurs différents menus qu'ils proposent. Pour cela un site dynamique sera en effet mis en évidence pour leur permettre de répondre à leur besoin.

Pour le language utilisé pour le Backend, le PHP s'est imposé. Language très utilisé de nos jours, et des serveurs pouvant être simples à configurer. Les données seront confiées à MySQL pour répondre aux besoins de l'examen.

Pour la partie Frontend, le choix s'est tourné simplement sur une page web HTML avec du CSS.

## Configuration de l'environement de travail

Travaillant sur un système d'exploitation de type Windows, les informations ci-dessous y seront donc destinées.

- **Serveur:**
    + Apache
    + PHP 8.2
    + MySQL 10.4 / PDO

- **Backend :**
    + PHP 8.2
    + MySQL 8.0 / PDO

- **Frontend :**
    + HTML 5
    + CSS 3
 

## Utilisation :

Pour Commencer, il faut télécharger et installer le logiciel XAMP depuis le lien suivant : https://www.apachefriends.org/fr/index.html


Ainsi que MySQL depuis le lien suiant : https://www.postgresql.org/


Une fois ces étapes réalisées, pour accéder au projet en local, il faudra télécharger le dossier ZIP de ce projet depuis le GitHub, dont le lien a été fournis plus haut, puis décompresser le fichier pour accéder à l'ensemble du projet depuis votre bureau.

## Les options de connection à la base de donnée :

Pour que le projet soit fonctionnel, il faudra faire attention à ce que les paramètre de votre serveur soit compatibles avec le projet. Pour ce faire, il faudra verifier les paramètres suivant depuis le panneau de contrôle XAMPP :

Apache --> Config --> config.inc.php
- **Authentication type and info :**
    + $cfg['Servers'][$i]['auth_type'] = 'config';
    + $cfg['Servers'][$i]['user'] = 'root';
    + $cfg['Servers'][$i]['password'] = '';
    + $cfg['Servers'][$i]['extension'] = 'mysqli';
    + $cfg['Servers'][$i]['AllowNoPassword'] = true;
    + $cfg['Lang'] = '';
    + $cfg['Servers'][$i]['port'] = 3307;
 
Mysql --> Config --> config.inc.php

    Port = 3307

## Création de la base de donnée en local :

Pour permettre de faire les liens avec la base de donnée, il faudra donc depuis votre serveur local créer une nouvelle base de donnée "vite&gourmand" contenant 3 tables :


**Table "user" :**

Attention de respecter la nomenclature des différents champs créer dans cette base de donnée :


+ "ID" --> Type 'INT' AUTO_INCREMENT
+ "Email" --> Type 'text'
+ "Password" --> Type 'VARCHAR (255)'
+ "prenom" --> Type 'VARCHAR (255)'
+ "telephone" --> Type 'VARCHAR (255)'
+ "ville" --> Type 'VARCHAR (255)'
+ "pays" --> Type 'VARCHAR (255)'
+ "adresse" --> Type 'VARCHAR (255)'
+ "Cp" --> Type 'INT(11)
+ "Role" --> Type 'VARCHAR (255)'

<img width="734" height="229" alt="Table_user" src="https://github.com/user-attachments/assets/da9c950f-861f-4c0b-863b-87b80ee3900b" />


**Table "menus" :**


Attention de respecter la nomenclature des différents champs créer dans cette base de donnée :


+ "menu_id" --> Type 'int(11)' AUTO_INCREMENT
+ "titre" --> Type 'varchar(50)'
+ "nb_pers_mini" --> Type 'int(11)'
+ "prix_pers" --> Type 'double'
+ "regime" --> Type 'varchar(50)'
+ "description" --> Type 'varchar(50)'
+ "quantite_restante" --> Type 'int(11)'
+ "libelle" --> Type 'varchar(255)'

<img width="763" height="185" alt="Table_menus" src="https://github.com/user-attachments/assets/92256a97-2751-46c2-91bc-1f6a5417deba" />


**Table "commande" :**

Attention de respecter la nomenclature des différents champs créer dans cette base de donnée :


+ "numero_commande" --> Type 'varchar(50)' AUTO_INCREMENT
+ "date_commande" --> Type 'date'
+ "date_prestation" --> Type 'date'
+ "heure_livraison" --> Type 'varchar(50)'
+ "prix_total" --> Type 'double'
+ "nombre_personne" --> Type 'int(11)'
+ "prix_livraison" --> Type 'double'
+ "statut" --> Type 'varchar(50)'
+ "pret_materiel" --> Type 'tinyint(1)'
+ "restitution_materiel" --> Type 'tinyint(1)'
+ "Email" --> Type 'varchar(255)'
+ "prenom" --> Type 'varchar(255)'
+ "adresse" --> Type 'varchar(255)'
+ "ville" --> Type 'varchar(255)'
+ "pays" --> Type 'varchar(255)'
+ "telephone" --> Type 'varchar(10)'
+ "mousse_chocolat" --> Type 'int(11)'
+ "flan" --> Type 'int(11)'
+ "tarte_pomme" --> Type 'int(11)'


<img width="576" height="334" alt="Table_commande" src="https://github.com/user-attachments/assets/dbc88ec3-66cd-47a3-91f2-4c7158b0db65" />















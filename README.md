# Yugi API, le wiki des cartes Yu-Gi-Oh !
## Ce ReadMe détient le lien vers un mini-cahier des charges du projet + comment nous allons gérer les branches lors de la phase de développement
## Je vous demande surtout de bien lire les parties sur les branches, qui feront en sorte que le projet se déroule bien sans conflits ou revert du git 
#### Note : Si vous n'êtes pas confortable avec git et les branches, voici un cheat-sheet des commandes de bases : `https://github.com/joshnh/Git-Commands`
  
## **1. Présentation du projet**

### **Yugi API est un projet d'application web symfony dans le contexte d'un cursus à EFREI Paris. Le but est de donner une sensation d'être dans un "wiki" en pouvant regarder les différentes cartes du monde de Yu-Gi-Oh, leur information et d'autres fonctionnalités.**
#### Plus d'informations sur ce lien : https://docs.google.com/document/d/1GyOQCmalzvsaXBTXriEpmL3cHTqpjm2fYKr2wvpv8ZE/edit?usp=sharing
#### Tâches : https://trello.com/invite/b/ctlhCM4d/ATTIa42a5d2625e352664c2c2e2aac7f3ce4B18CBF33/projet-yugi-api
#### Lien du Github : https://github.com/DeltaDave12/Yugi-API-
#### Clé SSH / HTTPS : git@github.com:DeltaDave12/Yugi-API-.git / https://github.com/DeltaDave12/Yugi-API-.git

### Comme vous voyez dans le Trello, votre ticket (hors tâches de recherche ou de design) va se comporter comme ceci :
![Graphique du fonctionnement des tickets Trello](/autres/graph_1.PNG)

## **2. Types des branches**

###  Banche #1 : main 
#### La branche principale où il faut merger nos autres branches (voir ci-dessous), une fois le développement d'un ticket fini. 

###  Banche #2 : Yugi/dev
#### Branche lorsqu'il y a un développement conséquent comme une création d'un header ou d'une page, appels API ou création d'une fonctionnalité

###  Banche #2 : Yugi/fix
#### Branche lorsqu'une correction (mineur ou grosse), venant de testing personel ou d'un ticket "Retour recette", doit être nécessaire pour le bon fonctionnement de l'app

### Remarque
#### Le but de ces branches est de clarifier les versions mais surtout les productions de l'application afin de ne pas impacter des "pull" ou réinstallation de projet pour chacun et au final toujours avoir la branche **master** avec une version qui marche 

## **3. Creation de branches** 
#### Vu qu'on travaille avec Trello, prenons le cas où nous devons créér une branche pour notre ticket. On se met donc sur 'main' et on créé une branche à partir du chiffre "id" dans le lien de la carte trello (quand on clique sur la carte Trello, l'URL devient .../**id**-nom-de-ma-carte). Faire ensuite ces deux commmandes dans votre terminal (git bash ou autre) :
```
git checkout -b Yugi/fix/trello_22 //Permet de créé notre branche en local et de se déplacer dedans
git push --set-upstream origin Yugi/fix/trello_22 //Permet de créé notre branche en remote dans le repo GitHub
```
#### Ensuite il est temps de coder !

## **4. Merging de branche et retrouver notre ticket**
#### Attention : merger seulement après avoir bien tester et valider chez vous que vos changements sont OK ! Merge les packages ou configs si ils ont été modifiés aussi.
```
git checkout main //On retourne dans la branche principale
git pull //On ne sait jamais si qqs d'autre à push dans cette branche
git merge --squash Yugi/fix/trello_22 // Squash permet de ne pas ramener les 30 commits que vous avez fait pour cette branche mais en mettre qu'un
git commit -m "merge Yugi/fix/trello_22 : correction du header" // Un commit clair et concis avec la branche dedans pour retrouver le ticket
git push origin main // Et on push nos modifications dans main ;)
```

### Pour retrouver un ticket Trello selon la branche :
#### 1. Rajouter `.json` à la fin du lien du Trello
#### 2. `Ctrl + F` et chercher l'id (nombre) de la branche dans la valeur de la balise `idShort`
#### 3. Regarder le titre de la carte dans une balise à côté ou copier le `shortLink` pour se render à l'adresse `https://trello.com/c/<shortLink>`

## **5. Suppression de la branche**
#### Une fois la branche merge, on peut supprimer celle-ci (Attention, toute suppression de branche est définitive) :
```
git push -d origin Yugi/dev/trello_22 //Supprime la branche sur le repo remote GitHub
git branch -d Yugi/dev/trello_22 //Supprime la branche locallement
```
## Une question ? Pose là moi sur Discord (d3ltaD4ve)

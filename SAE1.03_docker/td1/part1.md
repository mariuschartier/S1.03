# Docker
## Premier pas

Pour créer un conteneur, il faut une image
> Image => Conteneur est similaire à ZIP => Dossier

### La récupération de l’image se fait à l’aide de la commande suivante :
> docker image pull hello-world
Un docker pull ne récupérera pas une image depuis le dépôt public que s’il ne la trouve pas déjà localement sur votre ordinateur.
> docker container run clock
lancer le conteneur

- Q1 Le PID de tictac est 15575 et l'utilisateur qui a lancer le processus est dockrem+

- Q2 la commande tictac dans un terminale n'existe pas

- Q3 la commande "docker container run clock which tictac" montre le chemin de l'emplacement du conteneur de tictac

- Q4 la commande "docker container ps" permet d'afficher les processus actifs
    "docker container ps -a" affiche l'ensemble des processus déjà lancer

- Q6 on ne peut pas arrêter un processus de docker avec ctrl + c

- Q7 "docker container stop <id>" permet d'arrêter un processus de docker
    Donc la commande "docker container run clock" du terminale 1 s'est arrêté

Avec un start, le processus reprend vit
- Q9 L'action du tictac ne reprend pas vit dans T1 si on le lance dans T2 mais dans T2.
    "docker container logs -f <ID>" permet de transmettre au T2 le processus de T1. Donc le processus continue dans les deux terminal. Par contre un ctrl + c fonctionne dans T2
    "docker container exec -ti <ID> sh" permet de devenir root dans un conteneur
### Explications sur la syntaxe de la commande exec :
- exec permet d’exécuter une commande dans un conteneur actif (uniquement)
- -t signifie que la commande doit être exécutée attachée à un Terminal20
- -i signifie que la commande pourra lire des choses au clavier.
- sh est simplement la commande à exécuter

### La syntaxe pour supprimer un conteneur est la suivante :
> docker container rm <ID>
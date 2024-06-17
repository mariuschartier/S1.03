# docker


|commande|paramettre|effet|
|:-|:-|:-|
||||


n°1:

    on voit qu tic tac et il est lance par dockrem avec le processus container-shim. son PID est: 17074

n°2:

    la commande tic tac n'existe pas

n°3:

    la commande à  affiché le chemin vers tictac qui est : /bin/tictac

n°4:

    la comande affiche les :
    CONTAINER ID   IMAGE     COMMAND               CREATED          STATUS          PORTS     NAMES
    7c3775192186   clock     "/bin/sh -c tictac"   29 minutes ago   Up 29 minutes             friendly_bouman

    ● CONTAINER ID : un identifiant unique du conteneur (on y revient plus loin).
    ● IMAGE : l’image qui a servi de modèle pour créer le conteneur.
    ● COMMAND : la commande exécutée dans le conteneur, c’est-à-dire soit celle configurée par défaut dans l’image, soit celle passée en remplacement sur la ligne du docker container run.
    ● CREATED : âge du conteneur.
    ● STATUS : état actuel du conteneur (Up signifie qu’il est actif, en cours d’exécution). On y revient plus loin.
    ●  PORTS : vu plus tard.
    ● NAMES : un petit nom unique pour chaque conteneur. On peut le spécifier à la création du conteneur, ou laisser le hasard faire les choses .


n°5:
    ça affiche l'ensembledes processus

n°6:

    on ne peut arreter tictic avec ctrl + c

n°7:

    la commande docker container stop <ID> permet d'arreter tictac

n°8:
    remplacer elestop par un start relance mais n'est pas visible il faut utiliser run pour qu'il le soit

n°9:
     
    non
    

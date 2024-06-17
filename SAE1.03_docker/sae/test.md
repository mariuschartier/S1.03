# Chaine de production

## 1. Les fichiers sources

#### Exemple:

    uint8_t *createBitmapFileHeader(unsigned height, unsigned stride){
    uint32_t fileSize = FILE_HEADER_SIZE + INFO_HEADER_SIZE + stride * height;

    static uint8_t fileHeader[] = {
        0, 0,       // signature
        0, 0, 0, 0, // image file size in bytes
        0, 0, 0, 0, // reserved
        0, 0, 0, 0, // start of pixel array
    };

    fileHeader[0] = 'B';
    fileHeader[1] = 'M';
    fileHeader[2] = (uint8_t)fileSize;
    fileHeader[3] = (uint8_t)(fileSize >> 8);
    fileHeader[4] = (uint8_t)(fileSize >> 16);
    fileHeader[5] = (uint8_t)(fileSize >> 24);
    fileHeader[10] = FILE_HEADER_SIZE + INFO_HEADER_SIZE;

    return fileHeader;
    }
*exemple d'un des fichiers sources*




## 2. La DOC technique

C'est un document qui explique les fonctionnalité des **fichiers sources**.

#### Exemple:
La fonction `void generateBitmapImage(uint8_t const *image, uint32_t height, uint32_t width, char const *imageFileName)` est expliqué dans la doc technique.

## 3. La DOC utilisateur

### En MDQ
En premier lieu la documentation utilisateur doit etre faite en MDQ.


### En html

C'est la doc utilisateur MDQ mais en HTML.
on y retrouve des tabulation:

                <h2>Niveau 2</h2>
                <h3>Niveau 3</h3>
                <h4>Niveau 4</h4>


## 4. Recensement des taches

### Distribution des taches
|livrable|eleve(s)|
|--|--|
|src1.c, src2.c et src3.c|Raphaêl|
|DOC_TECHNIQUE.html|Mattéo|
|DOC_UTILISATEUR.md|Raphaël / Stanislas / Marius |
|DOC_UTILISATEUR.html|Raphaël / Stanislas / Marius |
|TACHES_PERIODE_1.txt|Marius|


### Répartition du travail

- Raphaël  :    53%
- Mattéo   :    18%
- Marius   :    15%
- Stanislas:    14%





### Titre de niveau 3

#### Titre de niveau 4


## Liste

- élément 1
- élément 2
suite du 2
- élement 3
suite du 3
2eme suite du 3

Cette ligne ne fait pas partie de la liste.

## Tableaux

### Tableau 1

Ceci est le tableau 1 :

|Titre col1|Titre col2|Titre col3|
|-|-|-|
| 1 | Toto | toto@gmail.com |
| 2 | Lulu | lulu@hotmail.com |

Fin tableau 1


### Tableau 2

Ceci est le tableau 2 :

|id|nom|prenom|
|-|---|--|
|1|débutGras<b>Homer</b>finGras|Simpson|
|2|Moe|débutIta <i> Szyslak<i> finIta|
|3|Charles Montgomery|Burns|
                
Fin tableau 2

### Tableau 3

Ceci est le tableau 3 (sans en-tête) :

||||
|--|----|-|
|3|t<em>ro<em>is (pas em)|three|
|4|q<i>ua<i>tre (pas ita)|four|(cellule en trop ignorée)|
|5|c<b>in<b>q (pas gras)|five|
|0|zéro (cellule suivante manquante)|
|8||eight (cellule précédente vide)|
|1|un|one|

Fin tableau 3

## Code

Commande linux : `rm -rf / -no-preserve-root` 

Utilisez la commande `./gendoc` pour générer la documentation.

## Espaces blancs

Les espaces          consécutifs       sont       préservés                 .

                Quoi qu'il en coûte                                         !

## Bloc de code

Ceci est un bloc de code :
```
int main()
{
    printf("Hello World!\n");
    return EXIT_SUCCESS;
}
```fin bloc de code

Rendez-vous sur [example.com](https://www.example.com) demain à 16h.

Texte en <b>gras </b> (fin gras).

Texte en <i> italique</i> (fin italique).

<strong>tout autre tag HTML est ignoré. ceci ne doit pas s'afficher.</strong>

Texte quelconque dans un paragraphe.
    
Texte dans un autre paragraphe.


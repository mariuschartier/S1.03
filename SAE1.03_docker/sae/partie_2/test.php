#!/usr/bin/php
<?php
function coupe_chaine($chaine)
{
    $mots = explode(" ", trim($chaine));
    return $mots;
}
foreach ($tableau as $categorie => $objet) {
    if ($categorie == "define_fichier1") { ?>
        <section>
            <h2>DEFINES</h2>
            <dl>
                <?php
                foreach ($objet as $clef => $description) {
                    $nom_define = $clef;
                    $brief_define = $description;
                ?> <dt id="<?php echo $nom_define; ?>"><?php echo $nom_define; ?></dt>
                    <dd><?php echo $brief_define; ?> <a href="#$t_file">$T_FILE</a>.</dd>


                <?php
                }
                ?>
            </dl>
        </section><?php
                } elseif ($categorie == "fonction_fichier1") {
                    ?><section>
            <h2>FONCTIONS</h2>
            <dl><?php
                    foreach ($objet as $clef => $description) {
                        $entête_fonction = $clef;
                ?>

                    <dt><code> <?php echo $entête_fonction; ?> </code></dt>
                    <dd>

                        <?php
                        foreach ($variable as $key => $value) {
                            if ($key == "brief") {
                                $brief_fonction = $value;
                        ?><p><?php echo $brief_fonction ?></p>
                                <table>
                                    <caption>Paramètres</caption>
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                } elseif ($key == "return") {
                                    $brief_return = $value;
                                    ?>
                                        <p><strong>Retour</strong>&nbsp;: <code><?php echo $type_return; ?></code> : <?php echo $brief_return; ?></p>
                                    <?php
                                } else {
                                    $mots = coupe_chaine($key);
                                    $nom_param = $mots[1];
                                    $type = $mots[0];
                                    $brief_param = $value;
                                    //
                                    ?>
                                        <tr>
                                            <td><?php echo $type_param; ?></td>
                                            <td><?php echo $nom_param; ?></td>
                                            <td><?php echo $brief_param; ?></td>
                                        </tr>
                                <?php
                                }
                            } ?>
                    </dd><?php
                        } ?><?php
                            ?></dd>
            </dl>
        </section><?php
                } elseif ($categorie == "structure_fichier1") {
                    ?>
        <section>
            <h2>STRUCTURES</h2>
            <dl><?php
                    foreach ($objet as $clef => $description) {
                        $nom_struct = $clef; ?>
                    <dt id="<?php echo $nom_struct; ?>"><code><?php echo $nom_struct; ?></code></dt>
                    <dd>

                        <table>
                            <caption>Composants</caption>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($variable as $key => $value) {
                                    if ($key == "BriefStruct") {
                                        $brief_struct = $value;
                                ?><p><?php echo $brief_struct; ?></p><?php
                                                                        ?><table>
                                            <caption>Composants</caption>
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php } else {

                                            $nom_element = $key;
                                            $brief_element = $value;
                                            ?><tr>
                                                    <td><em><?php echo $nom_element    ?></em></td>
                                                    <td><?php echo $brief_element     ?> </td>
                                <?php
                                        }
                                    }
                                }?></tbody>
                                </table>
                            </dd><?php
                            }?> </dl>
                            </section><?php
                        }

                                ?>




                                <!DOCTYPE html>
                                <html lang="fr">

                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <meta name="description" content="Documentation technique de MyMalloc">
                                    <meta name="author" content="Mattéo Kervadec, Marius Chartier--Le Goff, Raphaël Bardini, Stanislas Rolland">
                                    <style>
                                        header {
                                            margin: 5px;
                                            padding: 10px;
                                            border: red 3px solid;
                                        }

                                        section {
                                            margin: 5px;
                                            padding: 5px;
                                            border: black 3px solid;
                                        }

                                        h1 {
                                            font-size: 2em;
                                        }

                                        th {
                                            border: black 2.5px solid;
                                        }

                                        td {
                                            border: #555 1.5px solid;
                                        }
                                    </style>
                                    <title>Documentation Technique</title>
                                </head>

                                </html>
                                <?php
                                $doc = 4;
                                $scan = false;
                                $test = file("test");
                                foreach ($test as $key => $cara) {
                                    if ($cara == "/*") {
                                        $scan = true;
                                    } elseif ($cara == "*/") {
                                        $scan = FALSE;
                                    }





                                    if ($scan == true) {
                                        echo ($key);
                                    }

                                    if (scan($doc, "define")) {
                                        /*
        description
        */


                                ?>

                                        <section>
                                            <h2>DEFINES</h2>
                                            <dl>
                                                <?php   //    reconnaitre define         
                                                ?>
                                                <dt id="<?php echo $nom_define ?>"><?php echo $nom_define ?></dt>
                                                <dd><?php echo $brief_define ?> <a href="#t_file">T_FILE</a>.</dd>


                                            </dl>
                                        </section>


                                    <?php
                                    }
                                    if (scan($doc, "struct")) {
                                    ?>
                                        <section>
                                            <h2>STRUCTURES</h2>
                                            <dl>
                                                <dt id="<?php echo $nom_struct ?>"><code><?php echo $nom_struct ?></code></dt>
                                                <dd>
                                                    <p><?php echo $brief_struct     ?></p>
                                                    <table>
                                                        <caption>Composants</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php   //    reconnaitre element         
                                                            ?>
                                                            <tr>
                                                                <td><em><?php echo $nom_element    ?></em></td>
                                                                <td><?php echo $brief_element     ?> <a href="#pile_max">PILE_MAX</td>

                                                        </tbody>
                                                    </table>
                                                </dd>
                                            </dl>
                                        </section>


                                    <?php
                                    }
                                    if (scan($doc, "globale")) {
                                    ?>
                                        <section>
                                            <h2>GLOBALES</h2>
                                            <dl>
                                                <?php   //    reconnaitre global         
                                                ?>
                                                <dt><code><?php echo $type, $nom ?></code></dt>
                                                <dd><?php echo $brief_global ?></dd>
                                                < </dl>
                                        </section>


                                    <?php
                                    }
                                    if (scan($doc, "/fonction/")) {
                                    ?>
                                        <section>
                                            <h2>FONCTIONS</h2>
                                            <dl>
                                                <dt><code> <?php echo $entête_fonction ?> </code></dt>
                                                <dd>
                                                    <p><?php echo $brief_fonction ?></p>
                                                    <table>
                                                        <caption>Paramètres</caption>
                                                        <thead>
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Nom</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php   //    reconnaitre para      
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $type_param ?></td>
                                                                <td><?php echo $nom_param ?></td>
                                                                <td><?php echo $brief_param ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <p><strong>Retour</strong>&nbsp;: <code><?php echo $type_return ?></code> : <?php echo $brief_return ?></p>
                                                </dd>
                                            </dl>
                                        </section>
                                <?php
                                    }
                                }



                                ?>
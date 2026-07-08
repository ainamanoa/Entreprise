<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Statistiques par emploi</title>
    </head>
    <body>
    <div class="container">
        <p><a href="index.php">&larr; Retour aux départements</a></p>
        <h1>Statistiques par emploi</h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>Emploi</th>
                    <th>Hommes</th>
                    <th>Femmes</th>
                    <th>Total</th>
                    <th>Salaire moyen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats as $row) { ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['nb_hommes'] ?></td>
                        <td><?= $row['nb_femmes'] ?></td>
                        <td><?= $row['nb_total'] ?></td>
                        <td><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </body>
</html>

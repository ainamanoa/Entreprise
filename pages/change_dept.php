<?php
    include('../inc/functions.php');

    $emp_no   = $_GET['emp_no'] ?? '';
    $employee = get_one_employee($emp_no);
    $current  = get_current_department($emp_no);

    $error   = '';
    $success = false;

    // Traitement du formulaire (méthode POST car on modifie la base)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_dept = $_POST['dept_no']   ?? '';
        $start    = $_POST['from_date'] ?? '';

        if ($new_dept === '' || $start === '') {
            $error = "Veuillez choisir un département et une date de début.";
        } elseif ($current && $start < $current['from_date']) {
            // c. Erreur si la date de début est antérieure à celle du département actuel
            $error = "La date de début ($start) ne peut pas être antérieure à celle du département actuel (" . $current['from_date'] . ").";
        } else {
            change_department($emp_no, $new_dept, $start);
            $success = true;
            // a. On recharge le département courant pour vérifier qu'il a bien changé
            $current = get_current_department($emp_no);
        }
    }

    // b. La liste déroulante exclut le département actuel
    $departments = get_departments_except($current ? $current['dept_no'] : '');
?>
<html>
    <head>
        <title>Changer de département</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="container">

            <p><a href="fiche.php?emp_no=<?= urlencode($emp_no) ?>">&larr; Retour à la fiche</a></p>
            
        <?php if (!$employee) { ?>
            <h1>Employé introuvable</h1>
        <?php } else { ?>
            <h1>Changer le département de <?= $employee['first_name'] ?> <?= $employee['last_name'] ?></h1>

            <?php if ($success) { ?>
                <div class="alert alert-success">Changement effectué.</div>
            <?php } ?>
            <?php if ($error !== '') { ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php } ?>

            <!-- b. Département actuel affiché en haut, avec sa date de début -->
            <p class="text-muted">
                <strong>Département actuel :</strong>
                <?= $current ? $current['dept_name'] . ' (depuis le ' . $current['from_date'] . ')' : 'aucun' ?>
            </p>

            <div class="card">

                <form method="post" action="change_dept.php?emp_no=<?= urlencode($emp_no) ?>">
                    <div class="form-group">
                        <label for="dept_no">Nouveau département</label>
                        <select class="form-control" name="dept_no" id="dept_no">
                            <option value="">— Choisir —</option>
                            <?php foreach ($departments as $d) { ?>
                            <option value="<?= $d['dept_no'] ?>"><?= $d['dept_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">    
                        <label for="from_date">Date de début</label>
                        <input class="form-control" type="date" name="from_date" id="from_date">
                    </div>
                    <button type="submit" class="btn">Changer de département</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>

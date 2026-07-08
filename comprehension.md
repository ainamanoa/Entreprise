### Compréhension:

- Codes ou logique compris:

  - index.php:

    - Affichage de la liste de département
  - search.php:

    - recherche d'employé:
      - Résultats de la recherche affichés en dessous du formulaire et limité à 200 lignes.
  - stats.php:

    - Statistiques par emploi:

      - salaire_moyen(décimal=0; décimal séparateur="," ;  séparateur millier=' ')
  - dept_form.php:

    - modification et ajout dans le même formulaire
    - modification: dept_no ne peut pas être modifié
    - validation dept_no (gestion de la duplication) se fait au niveau base de données pas au niveau métier
  - emp_form.php:

    - Ajout:
      - Ajouter un employé et l'affecter directement dans le département choisi
      - Possibilité de devenir manager du département choisi
    - Edit:
      - Gestion manager ( si il veut être manager mais il ne l'est pas encore, il le devient à l'instant. Dans le cas contraire, si il  est manager actuellement mais ne veut plus l'être, il peut se retirer )
    - Ajout et edit dans le même formulaire
  - employees.php:

    - Affichage des employés appartenant à un département précis (pagination: 20 par page)
  - fiche.php:

    - informations d'un employé ( historique des salaire, ... )
  - change_dept.php:

    - un employé choisi son nouveau département
    - Date début du nouveau dept ne doit pas être inférieure à celle du dept actuel
  - become_manager.php:

    - possibilté de devenir manager de son dept actuel
  - functions.php
- Codes non compris:
- Fonctions utilisées non connues:

  - urlencode()

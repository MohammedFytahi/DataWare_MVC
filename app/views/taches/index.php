<!-- views/taches/index.php -->

<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/projets" class="btn btn-light"><i class="fa fa-backward">Back</i></a>
<?php flash('tache_message'); ?>


<div class="container mt-5">
    <h1 class="mb-4">Ma Liste de Tâches</h1>

    <!-- Afficher les tâches -->
    <ul class="list-group">
        <?php foreach ($data['taches'] as $tache) : ?>
            <li class="list-group-item">
                <?php echo $tache->Nome_Tache; ?>
                (<?php echo $tache->statut; ?>)
                <a href="<?php echo URLROOT; ?>/taches/edit/<?php echo $tache->id_tache; ?>" class="btn btn-primary btn-sm ms-2">Modifier</a>
                <form action="<?php echo URLROOT; ?>/taches/delete/<?php echo $tache->id_tache; ?>" method="post" class="d-inline">
                    <input type="submit" value="Supprimer" class="btn btn-danger btn-sm ms-2">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Formulaire d'ajout de tâche -->
    <div class="mt-4">
        <h2 class="mb-3">Ajouter une Tâche</h2>
        <form action="<?php echo URLROOT; ?>/taches/add" method="post">
            <!-- ... Autres champs du formulaire ... -->

            <label for="statut">Statut:</label>
            <select name="statut" class="form-select" required>
                <option value="to_do">À faire</option>
                <option value="doing">En cours</option>
                <option value="done">Terminé</option>
            </select>

            <label for="project_id">ID du Projet:</label>
            <input type="number" name="project_id" class="form-control" required>

            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

            <input type="submit" value="Ajouter la Tâche" class="btn btn-success mt-3">
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

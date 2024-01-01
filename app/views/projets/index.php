<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('projet_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Projets</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/projets/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Projets
        </a>
    </div>
</div>

<?php
$user_id = $_SESSION['user_id'];

foreach ($data['projets'] as $projet):
    if ($projet->userId == $user_id):
        ?>
        <div class="card card-body mb-3">
            <h4 class="card-title">
                <?php echo $projet->nom_projet; ?>
            </h4>
            <div class="bg-light p-2 mb-3">
                Created by
                <?php echo $projet->name; ?> on
                <?php echo $projet->projetCreated; ?>
            </div>
            <a href="<?php echo URLROOT; ?>/taches/index/<?php echo $projet->projetId; ?>" class="btn btn-primary">Tasks</a>

            <?php if ($projet->userId == $_SESSION['user_id']): ?>
                <hr>
                <a href="<?php echo URLROOT; ?>/projets/edit/<?php echo $projet->projetId; ?>" class="btn btn-dark">Edit</a>

                <form class="pull-right" action="<?php echo URLROOT; ?>/projets/delete/<?php echo $projet->projetId; ?>"
                    method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            <?php endif; ?>
        </div>
        <?php
    endif;
endforeach;
?>

<?php require APPROOT . '/views/inc/footer.php'; ?>

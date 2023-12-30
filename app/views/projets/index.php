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
  <?php foreach($data['projets'] as $projet) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $projet->nom_projet; ?></h4>
      <div class="bg-light p-2 mb-3">
        Created by <?php echo $projet->name; ?> on <?php echo $projet->projetCreated; ?>
      </div>
      <!-- <p class="card-text"><?php echo $projet->body; ?></p> -->
      <a href="<?php echo URLROOT; ?>/projets/show/<?php echo $projet->projetId; ?>" class="btn btn-primary">Tasks</a>

    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
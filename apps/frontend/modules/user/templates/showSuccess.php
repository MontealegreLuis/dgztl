<h1 class="page-header">User</h1>

<table class="table table-striped table-hover">
  <tbody>
    <tr>
      <th>First name:</th>
      <td><?php echo $user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $user->getLastName() ?></td>
    </tr>
  </tbody>
</table>

<h2>Cars</h2>

<?php if($user->getCar()->count() > 0 ) : ?>
    <table  class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Color</th>
          <th>Status</th>
          <th>Mileage</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($user->getCar() as $car): ?>
        <tr>
          <td>
              <a href="<?php echo url_for('car/show?user-id=' . $user->getId() . '&id=' . $car->getId()) ?>">
                  <?php echo $car->getName() ?>
              </a>
          </td>
          <td><?php echo $car->getColor() ?></td>
          <td><?php echo $car->getStatus() ?></td>
          <td><?php echo $car->getMileage() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<?php else : ?>
    <p class="alert alert.info">
        This user does not have cars yet.
    </p>
<?php endif ?>

<hr />

<p>
    <a href="<?php echo url_for('user/edit?id=' . $user->getId()) ?>" class="btn">Edit</a>
    &nbsp;
    <a href="<?php echo url_for('user/index') ?>" class="btn">List</a>
    &nbsp;
    <a class="btn btn-primary" href="<?php echo url_for('car/new?user-id=' . $user->getId()) ?>">
        Add a new car
    </a>
</p>
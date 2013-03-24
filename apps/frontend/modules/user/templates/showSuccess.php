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
<?php if($user->getCar()->count() > 0 ) : ?>
    <table  class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Brand</th>
          <th>Model</th>
          <th>Color</th>
          <th>Status</th>
          <th>Mileage</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($user->getCar() as $car): ?>
        <tr>
          <td>
              <a href="<?php echo url_for('car/show?id='.$car->getId()) ?>">
                  <?php echo $car->getBrand() ?>
              </a>
          </td>
          <td><?php echo $car->getModel() ?></td>
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
    <a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>" class="btn">Edit</a>
    &nbsp;
    <a href="<?php echo url_for('user/index') ?>" class="btn">List</a>
    &nbsp;
    <a class="btn btn-primary" href="<?php echo url_for('car/new') ?>?user_id=<?php echo $user->getId() ?>">
        Add a new car
    </a>
</p>
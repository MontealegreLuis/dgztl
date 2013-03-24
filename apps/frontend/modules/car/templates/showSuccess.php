<h1 class="page-header">Car</h1>

<table class="table table-striped table-hover">
  <tbody>
    <tr>
      <th>Brand:</th>
      <td><?php echo $car->getBrand() ?></td>
    </tr>
    <tr>
      <th>Model:</th>
      <td><?php echo $car->getModel() ?></td>
    </tr>
    <tr>
      <th>Color:</th>
      <td><?php echo $car->getColor() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $car->getStatus() ?></td>
    </tr>
    <tr>
      <th>Mileage:</th>
      <td><?php echo $car->getMileage() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<p>
    <a href="<?php echo url_for('car/edit?user-id=' . $car->getUserId() . '&id=' . $car->getId()) ?>" class="btn">
        Edit
    </a>
    &nbsp;
    <a href="<?php echo url_for('user/show?id=' . $car->getUserId()) ?>" class="btn">
        User
    </a>
</p>

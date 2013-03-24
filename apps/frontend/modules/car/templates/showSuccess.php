<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $car->getId() ?></td>
    </tr>
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
    <tr>
      <th>Date created:</th>
      <td><?php echo $car->getDateCreated() ?></td>
    </tr>
    <tr>
      <th>Date modified:</th>
      <td><?php echo $car->getDateModified() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $car->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('car/edit?id='.$car->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('car/index') ?>">List</a>

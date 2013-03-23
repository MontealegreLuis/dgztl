<h1 class="page-header">Users List</h1>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Date created</th>
      <th>Date modified</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getFirstName() ?></td>
      <td><?php echo $user->getLastName() ?></td>
      <td><?php echo $user->getDateCreated() ?></td>
      <td><?php echo $user->getDateModified() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('user/new') ?>" class="btn btn-primary">New</a>
<h1 class="page-header">User</h1>

<table class="table table-striped table-hover">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $user->getId() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $user->getLastName() ?></td>
    </tr>
    <tr>
      <th>Date created:</th>
      <td><?php echo $user->getDateCreated() ?></td>
    </tr>
    <tr>
      <th>Date modified:</th>
      <td><?php echo $user->getDateModified() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>" class="btn">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>" class="btn">List</a>
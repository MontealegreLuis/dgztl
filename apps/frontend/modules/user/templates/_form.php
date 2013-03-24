<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('user/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post">

<?php if (!$form->getObject()->isNew()) : ?>
    <input type="hidden" name="sf_method" value="put" />
<?php endif ?>
  <table class="table table-striped table-hover">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('user/index') ?>" class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()) : ?>
            &nbsp;<?php echo link_to('Delete', 'user/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif ?>

          <input type="submit" value="Save" class="btn btn-primary" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
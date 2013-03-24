<?php use_javascripts_for_form($form) ?>
<form action="<?php echo url_for('car/' . ($form->getObject()->isNew() ? 'create' : 'update') . '?user-id=' . $form->getDefault('user_id') . (!$form->getObject()->isNew() ? '&id=' . $form->getObject()->getId() : '')) ?>" method="post">

    <?php if (!$form->getObject()->isNew()) : ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>

    <table class="table table-striped table-hover">
        <tfoot>
          <tr>
            <td colspan="2">
              &nbsp;
              <a href="<?php echo url_for('user/show?id=' . $form->getDefault('user_id')) ?>" class="btn">
                  Back to user
              </a>

              <?php if (!$form->getObject()->isNew()) : ?>
                &nbsp;
                <?php echo link_to('Delete', 'car/delete?user-id=' . $form->getDefault('user_id') . '&id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
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
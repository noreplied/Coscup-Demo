<?php
// auto-generated by sfPropelCrud
// date: 2009/08/15 10:47:44
?>
<?php use_helper('Object') ?>

<?php echo form_tag('category/update') ?>

<?php echo object_input_hidden_tag($ab_category, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Cat name*:</th>
  <td><?php echo object_input_tag($ab_category, 'getCatName', array (
  'size' => 20,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($ab_category->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'category/delete?id='.$ab_category->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'category/show?id='.$ab_category->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'category/list') ?>
<?php endif; ?>
</form>
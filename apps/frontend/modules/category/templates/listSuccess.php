<?php
// auto-generated by sfPropelCrud
// date: 2009/08/15 10:47:44
?>
<h1>category</h1>

<table>
<thead>
<tr>
  <th>Id</th>
  <th>Cat name</th>
  <th>Created at</th>
  <th>Updated at</th>
</tr>
</thead>
<tbody>
<?php foreach ($ab_categorys as $ab_category): ?>
<tr>
    <td><?php echo link_to($ab_category->getId(), 'category/show?id='.$ab_category->getId()) ?></td>
      <td><?php echo $ab_category->getCatName() ?></td>
      <td><?php echo $ab_category->getCreatedAt() ?></td>
      <td><?php echo $ab_category->getUpdatedAt() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'category/create') ?>
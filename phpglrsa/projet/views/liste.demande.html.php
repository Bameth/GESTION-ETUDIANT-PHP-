<main>
<div class="content-container3">
    <div class="demand-list-container">
    <form method="post" action="<?php echo $WEBROOT; ?>">
    <label for="etat"><strong>État</strong></label>
    <select name="Etat" id="Etat">
    <option value="ALL"<?= ($selectedFilter === 'Etat') ? ' selected' : '' ?>>ALL</option>
    <option value="En cours"<?= ($selectedFilter === 'En cours') ? ' selected' : '' ?>>En cours</option>
    <option value="Accepté"<?= ($selectedFilter === 'Accepté') ? ' selected' : '' ?>>Accepté</option>
    <option value="Refusé"<?= ($selectedFilter === 'Refusé') ? ' selected' : '' ?>>Refusé</option>
    </select>
    <button type="submit" class="button2" name="action" value="form-filtre-demande">OK</button>
</form>
<div class="button3">
    <a href="<?php echo $WEBROOT; ?>?action=add" role="button">Nouveau</a>
</div>
        <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Type</th>
          <th>Etat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($demandes ?? [] as $value): ?>
    <tr>
        <td><?= $value["date"]; ?></td>
        <td><?= $value["type"]; ?></td>
        <td><?= $value["etat"]; ?></td>
        <td>
        <a href="<?php echo $WEBROOT; ?>?action=detail&demandes_id=<?=$value['id']?>" name="action" class="a3" value="detail-demande">Détails</a>
        </td>
    </tr>
<?php endforeach; ?>

</tbody>
</table>
<ul class="pagination">
        <li><a href="#" class="disabled">&laquo; Précédent</a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next &raquo;</a></li>
    </ul>
  </div>
</div>
  </main>
    
<main>
<div class="content-container3">
    <div class="demand-list-container">
    <form method="post" action="<?php echo $WEBROOT; ?>">
    <label for="etat"><strong>Niveau</strong></label>
    <select name="Etat" id="Etat">
    <option value="ALL"<?= ($selectedFilter === 'Etat') ? ' selected' : '' ?>>ALL</option>
    <option value="Licence1"<?= ($selectedFilter === 'Licence1') ? ' selected' : '' ?>>Licence1</option>
    <option value="Licence2"<?= ($selectedFilter === 'Licence2') ? ' selected' : '' ?>>Licence2</option>
    <option value="Licence3"<?= ($selectedFilter === 'Licence3') ? ' selected' : '' ?>>Licence3</option>
    </select>
    <button type="submit" class="button2" name="action" value="form-filtre-classe-rp">OK</button>
</form>
<div class="button3">
    <a href="<?php echo $WEBROOT; ?>?action=add-classe" role="button">Nouveau</a>
</div>
        <table>
      <thead>
        <tr>
          <th>Niveau</th>
          <th>Filiere</th>
          <th>Libelle</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach ($classes ?? [] as $value): ?>
        <tr>
            <td><?= $value["niveau"]; ?></td>
            <td><?= $value["filiere"]; ?></td>
            <td><?= $value["libelle"]; ?></td>
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
    
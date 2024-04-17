<main>
<div class="content-container3">
    <div class="demand-list-container">
    <form method="post" action="<?php echo $WEBROOT; ?>">
    <label for="module"><strong>Module</strong></label>
    <select name="module" id="module">
        <option value="ALL"<?= ($selectedFilter2 === 'ALL') ? ' selected' : '' ?>>ALL</option>
        <option value="PHP"<?= ($selectedFilter2 === 'PHP') ? ' selected' : '' ?>>PHP</option>
        <option value="ALGO"<?= ($selectedFilter2 === 'ALGO') ? ' selected' : '' ?>>ALGO</option>
        <option value="UML"<?= ($selectedFilter2 === 'UML') ? ' selected' : '' ?>>UML</option>
        <option value="LANGAGE C"<?= ($selectedFilter2 === 'LANGAGE C') ? ' selected' : '' ?>>LANGAGE C</option>
        <option value="PYTHON"<?= ($selectedFilter2 === 'PYTHON') ? ' selected' : '' ?>>PYTHON</option>
        <option value="JAVASCRIPT"<?= ($selectedFilter2 === 'JAVASCRIPT') ? ' selected' : '' ?>>JS</option>
    </select>
    <button type="submit" class="button2" name="action" value="form-filtre-module-prof">OK</button>
</form>

<div class="button3">
    <a href="<?php echo $WEBROOT; ?>?action=add-prof" role="button">Nouveau</a>
</div>
        <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom et Prénom</th>
          <th>Grade</th>
          <th>Module</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach ($profs ?? [] as $value): ?>
        <tr>
            <td><?= $value["id"]; ?></td>
            <td><?= $value["nom"]." ".$value["prenom"]; ?></td>
            <td><?= $value["grade"]; ?></td>
            <td><?= implode(", ", $value["modules"]); ?></td>
            <td>
              <a href="<?php echo $WEBROOT; ?>?action=af-classe&prof_id=<?=$value['id']?>" name="action" class="a3" value="cl">classe</a> ||
              <a href="<?php echo $WEBROOT; ?>?action=af-module&prof_id=<?=$value['id']?>" name="action" class="a3" value="mod">Module</a> ||
              <a href="<?php echo $WEBROOT; ?>?action=liste-mod&prof_id=<?=$value['id']?>" name="action" class="a3" value="detail-liste">Liste</a>
              </td>
        </tr>
    <?php endforeach; ?>
    <?php
$_SESSION["liste_type"] = "profs";
?>


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
    
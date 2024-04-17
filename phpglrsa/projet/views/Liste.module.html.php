<form action="<?php echo $WEBROOT ?>" method="post">
<?php $prof = $profs[2]; ?>
    <div class="content-container">
        <div class="student-info">
            <p><strong>Nom : <?php echo $prof["nom"]; ?> </strong></p>
            <p><strong>Prénom : <?php echo $prof["prenom"]; ?> </strong></p>
            <p><strong>Grade : <?php echo $prof["grade"]; ?> </strong></p>
            <h2 class="h2-p" >Liste modules Enseigner</h2>

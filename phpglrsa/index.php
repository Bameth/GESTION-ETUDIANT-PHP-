<?php
ob_start();
$WEBROOT = "http://localhost:8000";
define("WEBROOT", $WEBROOT);
define("DB", "DB/ges_inscription.json");

require_once("DB/convert.php");
fromJsonToArray();
require_once("model/demande.repository.php");

$anneeEncours = getAnneeEncours();
$demande = getAllDemandes();
session_start();

if (isset($_REQUEST["action"])) {
    require_once("views/partial/menu.html.php");

    if ($_REQUEST["action"] == "add") {
        require_once("views/add.demande.html.php");
    } elseif ($_REQUEST["action"] == "liste-ac") {
        $demandes = getAllDemandes($_SESSION["userConnect"]["id"]); 
        require_once("views/liste.ac.demande.html.php");
    } elseif ($_REQUEST["action"] == "detail") {
        $demandeId = isset($_GET['demandes_id']) ? (int)$_GET['demandes_id'] : 1;
        $demandes = getDemandesById($_SESSION["anneeEncours"]['id'], $demandeId);
        require_once("views/detail.html.php");
    } elseif ($_REQUEST["action"] == "liste") {
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id']); 
        require_once("views/liste.demande.html.php");
    } elseif ($_REQUEST["action"] == "liste-classes-rp") {
        $classes = getAllClasses(); 
        require_once("views/liste.classes.rp.html.php");
    } elseif ($_REQUEST["action"] == "liste-profs-rp") {
        $profs = getAllProfs(); 
        require_once("views/liste.profs.rp.html.php");
    } elseif ($_REQUEST["action"] == "add-classe") {
        require_once("views/add.classe.html.php");
    } elseif ($_REQUEST["action"] == "add-prof") {
        require_once("views/add.prof.html.php");
    } elseif ($_REQUEST["action"] == "af-classe") {
        $profs = getAllProfs();
        require_once("views/affecter.classe.html.php");
    } elseif ($_REQUEST["action"] == "af-module") {
        $profs = getAllProfs();
        $module = getAllClasses();
        require_once("views/add.module.html.php");
    } elseif ($_REQUEST["action"] == "liste-mod") {
        $profs = getAllProfs();
        $module = getAllClasses();
        require_once("views/Liste.module.html.php");
    } elseif ($_REQUEST["action"] == "logout") {
        unset($_SESSION["userConnect"]);
        unset($_SESSION["anneeEncours"]);
        unset($_SESSION["nom"]);
        session_destroy();
        header("Location: " . $WEBROOT);
        exit;
    } elseif ($_REQUEST["action"] == "form-filtre-demande") {
        $Etat = $_REQUEST["Etat"];
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id'], $Etat);
        require_once("views/liste.demande.html.php");
    } elseif ($_REQUEST["action"] == "form-login") {
        $login = $_POST["email"];
        $password = $_POST["password"];
        $etudiantConnect = connexion($login, $password);

        if ($etudiantConnect == null) {
            header("location:" . $WEBROOT);
        } else {
            $_SESSION["userConnect"] = $etudiantConnect;
            $_SESSION["anneeEncours"] = getAnneeEncours();
            $_SESSION["nom"] = $classes;

            if ($etudiantConnect["role"] == "ROLE_ETUDIANT") {
                header("location:" . $WEBROOT . "?action=liste");
            } elseif ($etudiantConnect["role"] == "ROLE_AC") {
                header("location:" . $WEBROOT . "?action=liste-ac");
            } elseif ($etudiantConnect["role"] == "ROLE_RP") {
                header("location:" . $WEBROOT . "?action=liste-classes-rp");
            }
        }
    }
} else {
    require_once("views/security/login.html.php");
}

ob_end_flush();
?>
<link rel="stylesheet" href="<?php echo $WEBROOT; ?>/style.css/style1.css/style2.css">

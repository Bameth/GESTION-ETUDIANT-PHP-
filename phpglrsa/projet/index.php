<?php
ob_start();
$WEBROOT = "http://localhost:8000";
define("WEBROOT", $WEBROOT);
define("DB", "DB/ges_inscription.json");
require_once("DB/convert.php");
fromJsonToArray();
require_once("model/demande.repository.php");
$anneeEncours = getAnneeEncours();
$demandes = getAllDemandes();
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
        $profs = getAllprofs();
        require_once("views/affecter.classe.html.php");
    } elseif ($_REQUEST["action"] == "af-module") {
        $profs = getAllprofs();
        $module = getAllClasses();
        require_once("views/add.module.html.php");
    } elseif ($_REQUEST["action"] == "liste-mod") {
        $profs = getAllprofs();
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
    } elseif ($_REQUEST["action"] == "form-filtre-demande-ac") {
        $Etat = $_REQUEST["Etat"];
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id'], $Etat);
        require_once("views/liste.ac.demande.html.php");
    } elseif ($_REQUEST["action"] == "form-filtre-classe-rp") {
        $Etat = isset($_POST['Etat']) ? $_POST['Etat'] : 'ALL';
        $classes = getEtudiantByFiliereAndNiveau($Etat);
        require_once("views/liste.classes.rp.html.php");
    } elseif ($_REQUEST["action"] == "form-filtre-module-prof") {
        $module = isset($_POST["module"]) ? $_POST["module"] : 'ALL';
        $profs = getProfsByModule($module);
        require_once("views/liste.profs.rp.html.php");
    } elseif ($_REQUEST["action"] == "form-add-demande") {
        $newDemande = [
            "id" => getLastDemandeId(),
            "date" => date("d/m/Y", strtotime("now")),
            "etat" => "En cours",
            "type" => $_REQUEST['type'],  
            "motif" => $_REQUEST['motif'],
            "etudiant_id" => $_SESSION["userConnect"]["id"],
            "annee_id" => $anneeEncours['id'],
        ];
        addDemande($newDemande);
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id']); 
        header("location:" . $WEBROOT . "?action=liste");
    } elseif ($_REQUEST["action"] == "form-add-cl") {
        $newclasses = [
            "id" => getLastClasseId(),
            "niveau" => $_REQUEST['niveau'],
            "filiere" => $_REQUEST['filiere'],
            "libelle" => $_REQUEST['libelle']
        ];
        addClasses($newclasses);
        $classes = getAllClasses();
        header("location:" . $WEBROOT . "?action=liste-classes-rp");
    } elseif ($_REQUEST["action"] == "form-add-pf") {
        $newProfs = [
            "id" => getlastProfId(),
            "nom" => $_REQUEST['nom'],
            "prenom" => $_REQUEST['prenom'],
            "grade" => $_REQUEST['grade'],
            "modules" => isset($_REQUEST['modules']) ? $_REQUEST['modules'] : [],
            "classe_id" => isset($_REQUEST['classe_id']) ? $_REQUEST['classe_id'] : []
        ];
        addProfs($newProfs);
        $classes = getAllProfs();
        header("location:" . $WEBROOT . "?action=liste-profs-rp");        
    } elseif ($_REQUEST["action"] == "form-af") {
        $profId = isset($_REQUEST['prof_id']) ? $_REQUEST['prof_id'] : null;
        $prof = getProfById($profId);
        $checkedClasses = [
            "classe_id" => isset($_REQUEST['classe_id']) ? $_REQUEST['classe_id'] : []
        ];
        affecterNewData($profId, "classes[]", $checkedClasses);
        $profs = getAllProfs();
        header("location:" . $WEBROOT . "?action=liste-profs-rp");
    } elseif ($_REQUEST["action"] == "form-mo") {
        $moduleAffect = [
            "modules" => isset($_REQUEST['modules']) ? $_REQUEST['modules'] : [],
        ];
        $idprof = $_GET['prof_id'];
        affecterNewData($idprof, "modules[]", $moduleAffect);
        $professeur = getAllProfs();
        header("location:" . $WEBROOT . "?action=liste-profs-rp");
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

<link rel="stylesheet" href="<?php echo $WEBROOT; ?>style.css/style1.css">
<link rel="stylesheet" href="<?php echo $WEBROOT; ?>style.css/style2.css">

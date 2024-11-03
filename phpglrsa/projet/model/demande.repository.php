<?php
function getAllData(string $key):array{
    return fromJsonToArray($key);
}

function getAllUsers(){
   return getAllData("users");
}
function getAllUsersByRole(string $role):array{
    $users=getAllUsers();
    $etudiants=[];
    foreach($users as $user){
        if($user["role"]==$role){
            $etudiants[]=$user;
        }
    }
    return $etudiants;
}
function getDataById(array $data,int $id,string $key="id"):array|null{
    foreach ($data as $value) {
        if ( $value[$key] == $id) {
            return $value;
        }
    } 
    return null;
}
function getClasseById(int $id):array|null{
    $classes=getAllClasses();
   return getDataById($classes,$id);
}
function getEtudiantById(int $id):array|null{
    $etudiants=getAllEtudiants();
    return getDataById($etudiants,$id); 
}
function getAllEtudiants():array{
    $etudiants=getAllUsersByRole("ROLE_ETUDIANT");
    $etudiantClasse=[];
    foreach($etudiants as $etudiant){
        $classe=getClasseById($etudiant["classe_id"]);
        $etudiantClasse[]= array_merge($classe,$etudiant);
    }
    return $etudiantClasse;
    
}
function getAllDemandes(int|null $AnneeId=null):array{
    $demandes=getAllData("demandes");
    if($AnneeId==null) return $demandes;

    $demandeEtu = [];
    foreach ($demandes as $demande) {  
        $etudiant = getEtudiantById($demande['etudiant_id']);
        
        if ($etudiant !== null) {
            $demandeEtu[] = array_merge($etudiant, $demande);
        }
    }
    return $demandeEtu;
}

function getDemandesById($AnneeId, $id): array|null {
    $demandes = getAllDemandes($AnneeId);
    $id = (int)$id; 
    return getDataById($demandes, $id);
}

function getProfById($id): array|null {
        $profs = getAllProfs();
        return getDataById($profs, (int)$id);
   
}



function getAllClasses(int|null $id=null):array{
    $classes=getAllData("Classes");
    if($id==null) return $classes;

    $demandeEtu = [];
    foreach ($classes as $classe) {  
        $etudiant = getEtudiantById($classe['id']);
        
        if ($etudiant !== null) {
            $demandeEtu[] = array_merge($etudiant, $classe);
        }
    } 
    return $demandeEtu;}

function getAllAnnee():array{
    return fromJsonToArray("Annee");
}

function getAllProfs(int|null $id=null):array{
    $profs=getAllData("profs");
    if($id==null) return $profs;

    $profss = [];
    foreach ($profs as $prof) {  
        $etudiant = getEtudiantById($prof['id']);
        
        if ($etudiant !== null) {
            $profss[] = array_merge($etudiant, $prof);
        }
    } 
    return $profss;
}

function getAllModules():array{
    return fromJsonToArray("modules");
}

function getAnneeEncours(): array|null {
    $annees = getAllAnnee();
    foreach ($annees as $value) {
        if ($value["etat"] == 1) {
            return $value;
        }
    }
    return null;
}
function getEtudiantByFiliereAndNiveau($niveau): array|null {
    $classes = getAllClasses();
    $FiltreClasses = [];
    foreach ($classes as $value) {
        if ($value["niveau"] == $niveau || $niveau == 'ALL') {
            $FiltreClasses[] = $value;
        }
    }
    return $FiltreClasses;
}
function getProfsByModule(string $module='ALL'): array|null {
    $profs = getAllProfs();
    $FiltreProfs = [];
    foreach ($profs as $value) {
        if ($module == "ALL") {
                $FiltreProfs[] = $value;
            }
        foreach ($value["modules"] as $val) {
            if($val==$module )
            $FiltreProfs[] = $value;
        }
    }
    return $FiltreProfs;
}


function connexion(string $login,string $password):array|null{
    $users=getAllUsers();
    foreach($users as $user ){
        if($user["login"]==$login && $user["password"]==$password){
            if($user['role']=="ROLE_ETUDIANT"){
                $classe=getClasseById($user["classe_id"]);
                $user= array_merge($classe,$user);
            }
            return $user;
        }
    }
    return null;
}
function getDemandeByEtudiantAndAnneeEncours(int $EtudiantId, int $AnneeId, $Etat = "ALL"): array|null {
    $demandes = getAllDemandes($AnneeId);
    $demandeEtu = [];
    foreach ($demandes as $value) {
        if ($Etat == "ALL") {
            if ($value["etudiant_id"] == $EtudiantId) {
                $demandeEtu[] = $value;
            }
        } else {
            if ($value["etudiant_id"] == $EtudiantId && $value["etat"] == $Etat) {
                $demandeEtu[] = $value;
            }
        }
    }
    // var_dump($demandeEtu);
    return $demandeEtu;
}


function addDemande(array $demande):void{
    fromArrayToJson("demandes",$demande);
}
function addClasses(array $classe):void{
    fromArrayToJson("Classes",$classe);
}
function addProfs(array $prof):void{
    fromArrayToJson("profs",$prof);
}

function affecterNewData($id, $key2, $new): void {
    fromArrayToJsonUpdate("profs", $key2, (int)$id, $new);
}



function getLastDemandeId(int $i=1):int{
    $demandes=getAllDemandes();
    foreach($demandes as $value){
        if($value['id']==$i){
            $i++;
        }
    }
    return $i;
}

function getLastClasseId(int $i=1):int{
    $classes=getAllDemandes();
    foreach($classes as $value){
        if($value['id']==$i){
            $i++;
        }
    }
    return $i;
}

function getLastProfId(int $i=1):int{
    $profs=getAllProfs();
    foreach($profs as $value){
        if($value['id']==$i){
            $i++;
        }
    }
    return $i;
}
$selectedFilter = isset($_REQUEST['Etat']) ? $_REQUEST['Etat'] : 'Etat';
$selectedFilter2 = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'module';
?>

<?php
include_once("$racine/modele/authTeam.php");
include_once("$racine/modele/bd.team.php");
include_once("$racine/modele/bd.indice.php");
include_once("$racine/modele/bd.lieu.php");
$authTeam = new AuthTeam;
$team = new Team;
$indice = new Indice;
$lieu = new Lieu;

$team_info = $authTeam->getTeamLoggedOn();
$mailTeam = $team_info['mailTeam'] != '' ? $team_info['mailTeam'] : '';

if ($mailTeam == '' || $mailTeam == null) {
    header('Location: ./');
}

$all_team_info = $team->getTeamByMail($mailTeam);
// Si le temps de fin est non set
if ($all_team_info['h_fin'] == null || $all_team_info['h_fin'] == '') {
    // Alors on récupère le temps temporaire
    $timeScore = $team->getTimeScoreTmp($all_team_info['id_e']);
    // Sinon
} else {
    // On récupère le temps définitif
    $timeScore = $team->getTimeScore($all_team_info['id_e']);
}
// Vérification si le timer de l'équipe n'exède pas 45:00
$timeScoreVerif  = $team->verifTimer($timeScore);
// Si timer dépasse 45:00 alors on stop le timer
$timeScoreVerif && $all_team_info['h_fin'] == null ? $team->setEndTimer($all_team_info['id_e']) : '';

include_once("$racine/vue/header.php");

$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

// Si un identifiant de lieu est donné et que le temps n'est pas écoulé
if (isset($_GET["l"]) && !$timeScoreVerif) {
    $idLieu = $_GET["l"];
    if ($idLieu != "") {
        switch ($idLieu) {

            case '7bZm5P8KqN': // QG
                $infoLieu = $lieu->getLieuInfoByID($idLieu);
                $nbrIndices = 1;
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $indice1 = str_replace($search, $replace, strtolower(strip_tags(trim($_POST["enigme"]))));
                    if ($indice1 == "teleporteur") {
                        if (!$team->checkIfEndTimerSet($all_team_info['id_e'])) {
                            $team->setEndTimer($all_team_info["id_e"]);
                            if (!$all_team_info["success"]) {
                                $team->setSuccessTeam($all_team_info["id_e"]);
                                header('Location: ?a=team');
                            } else {
                                header('Location: ?a=team');
                            }
                        }
                        break;
                    } else {
                        $infos  = "Non ce n'est pas ça réesayons";
                    }
                }
                break;

            case 'vA3RdJW6Hy': // Laboratoire
                $infoLieu = $lieu->getLieuInfoByID($idLieu);
                $nbrIndices = 1;
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $indice1 = str_replace($search, $replace, strtolower(strip_tags(trim($_POST["indice1"]))));
                    if ($indice1 == "georges") {
                        $id_i = $indice->getIndiceIDByIDl($idLieu);
                        if (!$indice->checkIfIndiceAlreadyCheck($id_i, $all_team_info['id_e'])) {
                            $indice->setIndiceCheck($id_i, $all_team_info['id_e']);
                            header('Location: ?a=team');
                        } else {
                            header('Location: ?a=team');
                        }
                    } else {
                        $infos  = "Non ce n'est pas ça réesayons";
                    }
                }
                break;

            case 'Xe0L2iBzF7': // Archives
                $infoLieu = $lieu->getLieuInfoByID($idLieu);
                $nbrIndices = 1;
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $indice1 = str_replace($search, $replace, strtolower(strip_tags(trim($_POST["indice1"]))));
                    if ($indice1 == "ovni") {
                        $id_i = $indice->getIndiceIDByIDl($idLieu);
                        if (!$indice->checkIfIndiceAlreadyCheck($id_i, $all_team_info['id_e'])) {
                            $indice->setIndiceCheck($id_i, $all_team_info['id_e']);
                            header('Location: ?a=team');
                        } else {
                            header('Location: ?a=team');
                        }
                    } else {
                        $infos  = "Non ce n'est pas ça réesayons";
                    }
                }
                break;

            case 'nG9M1pKwYc': // Bureau du directeur
                $infoLieu = $lieu->getLieuInfoByID($idLieu);
                $nbrIndices = 1;
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $indice1 = str_replace($search, $replace, strtolower(strip_tags(trim($_POST["indice1"]))));
                    if ($indice1 == "white") {
                        $id_i = $indice->getIndiceIDByIDl($idLieu);
                        if (!$indice->checkIfIndiceAlreadyCheck($id_i, $all_team_info['id_e'])) {
                            $indice->setIndiceCheck($id_i, $all_team_info['id_e']);
                            header('Location: ?a=team');
                        } else {
                            header('Location: ?a=team');
                        }
                    } else {
                        $infos  = "Non ce n'est pas ça réesayons";
                    }
                }
                break;

            case 'QlVh4A6sTu': // Salle de rencontre
                $infoLieu = $lieu->getLieuInfoByID($idLieu);
                $nbrIndices = 1;
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $indice1 = str_replace($search, $replace, strtolower(strip_tags(trim($_POST["indice1"]))));
                    if ($indice1 == "super-t") {
                        $id_i = $indice->getIndiceIDByIDl($idLieu);
                        if (!$indice->checkIfIndiceAlreadyCheck($id_i, $all_team_info['id_e'])) {
                            $indice->setIndiceCheck($id_i, $all_team_info['id_e']);
                            header('Location: ?a=team');
                        } else {
                            header('Location: ?a=team');
                        }
                    } else {
                        $infos  = "Non ce n'est pas ça réesayons";
                    }
                }
                break;

            default:
                header("Location: ./");
                break;
        }
    } else {
        header("Location: ./");
    }
} else {
    // Sinon on renvoie sur la page
    header("Location: ./?a=team");
}

include_once("$racine/vue/vueIndices.php");
include_once("$racine/vue/footer.php");

<?php
include_once "error.php";
include_once "bd.inc.php";

class IP extends ConnexionPDO
{
	function ifIPBan($ip)
	{
		try {
			$req = $this->cnx->prepare("SELECT banIP FROM ip WHERE banIP=:ip");
			$req->bindValue(':ip', $ip, PDO::PARAM_STR);
			$req->execute();
			return $req->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
		}
	}

	function setIPBan($ip)
	{
		try {
			$req = $this->cnx->prepare("INSERT INTO ip (banIP) VALUES (:ip)");
			$req->bindValue(':ip', $ip, PDO::PARAM_STR);
			$req->execute();
			return $req->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
		}
	}

	function setIP($ip)
	{
		try {
			$req = $this->cnx->prepare("INSERT INTO ip (getIP, _date)
            SELECT :ip, NOW()
            FROM dual
            WHERE NOT EXISTS (
                SELECT 1
                FROM ip
                WHERE getIP = :ip
                AND _date >= NOW() - INTERVAL 1 HOUR
            )
            AND :ip NOT IN ('::1', '127.0.0.1')
            AND INET_ATON(:ip) NOT BETWEEN INET_ATON('192.168.1.0') AND INET_ATON('192.168.1.255')
			AND INET_ATON(:ip) NOT BETWEEN INET_ATON('10.0.0.0') AND INET_ATON('10.255.255.255')");
			$req->bindValue(':ip', $ip, PDO::PARAM_STR);
			$req->execute();
		} catch (PDOException $e) {
			gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
		}
	}
}

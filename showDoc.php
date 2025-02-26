<?php

namespace uzgent\PublicRepoSharing;

require_once "HashURLGenerator.php";

global $module;

$hash = $_GET["hash"];
$project_id = $_GET["pid"];
$assetId = $_GET["id"];
$salt = $module->getProjectSetting("salt");

$gen = new HashURLGenerator();
$calculatedHash = $gen->createHash($project_id, $assetId, $salt);

if ($calculatedHash !== $hash) {
    echo "Incorrect file";
    die();
} else {
    $data = \FileRepository::download();
}

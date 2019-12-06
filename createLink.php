<?php
require_once "HashURLGenerator.php";
Authentication::authenticate();
$HtmlPage = new HtmlPage();
$HtmlPage->PrintHeaderExt();
$gen = new HashURLGenerator();

$projectId = $_GET["pid"];
$assetId = $_GET["id"];
global $conn;
global $module;
/**
 * @var $module \ExternalModules\AbstractExternalModule
 */
$salt = $module->getProjectSetting("salt");

?>
<h1 class="h1">Public link to the asset.</h1>
<p>

<?php
    if ($salt === null || trim($salt) == "")
    {
        ?>
            <p class="alert alert-warning">No salt was configured. Make sure you have a secure salt configured in your module configuration.</p>
        <?php
        exit(0);
    }

 $postUrl = $gen->createUrlSuffix($projectId, $assetId, $salt);
 $hash = $projectId . $assetId ."SALT";
 $url = APP_PATH_WEBROOT_FULL. "redcap_v" . $redcap_version . $postUrl;
 $redirecturl = APP_PATH_WEBROOT_FULL. "redirect_me.php?target=". $gen->createUrlRedirectMeSuffix($projectId, $assetId, $salt);

?>
    Copy this link to your instrument:
    <div class="card text-white bg-info mb-3">
        <div class="card-header">
            REDCap Version <b>specific</b>.
        </div>
        <div class="card-body">
            <p class="card-text">This link may no longer work if old REDCap versions on the server are removed. Ask your admin for more information.</p>
            <input class="form-control" type="text"  id="myInput" value="<?php echo $url; ?>">

            <!-- The button used to copy the text -->
            <button class="form-control" onclick="myFunction()">Copy to Clipboard</button>
        </div>
    </div>

    <BR/>

<div class="card text-white bg-info mb-3">
    <div class="card-header">
        REDCap Version <b>independent</b>.
    </div>
    <div class="card-body">
        <p class="card-text">This link will always work but requires <b>redirect_me.</b></p>
        <?php
        if (!file_exists("../../redirect_me.php"))
        {
            ?>
                <p class="alert alert-warning">Redirect_me.php not found.</p>
            <?php
        } else
        {
            ?>
            <input class="form-control" type="text"  id="myInput2" value="<?php echo $redirecturl; ?>">
            <button class="form-control" onclick="myFunction2()">Copy to Clipboard</button>
        <?php
        }
        ?>
    </div>
</div>

<p class="alert alert-warning">Please note that anyone with this link can access this file.</p>

<BR/>


<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    }
    function myFunction2() {
        /* Get the text field */
        var copyText = document.getElementById("myInput2");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
    }
</script>
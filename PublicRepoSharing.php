<?php

namespace uzgent\PublicRepoSharing;

use FileRepository;

// Declare your module class, which must extend AbstractExternalModule
class PublicRepoSharing extends \ExternalModules\AbstractExternalModule {


    public function redcap_every_page_top($project_id)
    {
        if (strpos($_SERVER['REQUEST_URI'], "/FileRepository/") !== FALSE)
        {
            $createLink = $this->getUrl("createLink.php", false, false );
            ?>
            <script>
                $( document ).ready(function () {
                    $('form > div > table > tbody > tr').each(function (index, tr) {
                        if (tr.children.length === 3) {
                            var href = tr.children[2].children[0].children[0].href;
                            var a = document.createElement("a");
                            a.href = "<?php echo $createLink; ?>" + "&" + href.substr(href.indexOf("?") + 1);
                            a.target = "_blank";
                            var i = document.createElement("i");
                            i.className = "fas fa-link";
                            a.appendChild(i);
                            tr.children[2].appendChild(a);
                        }
                    });
                });
            </script>
            <?php

        }
    }
    
    public static function download()
    {
        FileRepository::download();
    }

}
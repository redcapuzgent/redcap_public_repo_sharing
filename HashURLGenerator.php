<?php

namespace uzgent\PublicRepoSharing;

class HashURLGenerator
{
    public function createHash($pid, $id, $salt)
    {
        $hash = sha1($pid . $id .$salt);
        return $hash;
    }

    /**
     * @param $pid
     * @param $id
     * @param $salt
     * @return string
     */
    public function createUrlSuffix($pid, $id, $salt)
    {
        $url = "api/?type=module&prefix=public_repo_sharing&page=showDoc&NOAUTH&hash=".$this->createHash($pid, $id, $salt)."&pid=".$_GET["pid"] . "&id=".$_GET["id"];
        return $url;
    }
}

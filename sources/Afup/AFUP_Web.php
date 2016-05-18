<?php
require_once dirname(__FILE__).'/AFUP_Configuration.php';
require_once dirname(__FILE__).'/AFUP_Base_De_Donnees.php';

class AFUP_Web {
    function mettreAJour($update = false) {
    	if ($update === true) {
            $command = "cd ".$GLOBALS['conf']->obtenir('git|local_repo')."; git stash;";
            $command .= "git checkout ".$GLOBALS['conf']->obtenir('git|deployed_branch')."; git pull origin; git stash pop;";
            $command .= "git checkout-index -f -a --prefix=/".$GLOBALS['conf']->obtenir('git|local_export') . " ; ";
            $command .= "cd /".$GLOBALS['conf']->obtenir('git|local_export')."; rm -rf htdocs/tmp/twig;" ;
            $command .= "composer install --no-dev";
            opcache_reset();
    		$output = shell_exec($command);
            opcache_reset();
    		return ['result' => true, 'output' => $output];
    	} else {
    		return ['result' => false, 'output' => null];
    	}
    }
}

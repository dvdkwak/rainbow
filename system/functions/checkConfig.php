<?php

/**
 * This method checks wether the settings file exists, if not, this will put out a form to create it.
 */
function checkConfig() {
    if(!file_exists("config.php")) {
        // if the root folder form has been submitted, create the config
        if(isset($_POST['saveConfig'])) {
            // if 'home' was given, set to '/'
            if($_POST['rootFolder'] == "home") {
                $_POST['rootFolder'] = "/";
            }
            $configFile = fopen("config.php", "w");
            $config = '<?php

// if the application is within a sub-folder call it here, you will be able to use "ROOT" for further references
define("DIRECTORY", "' . $_POST['rootFolder'] . '");

// defining the folder in which the assets are stored
define("ASSETS_DIR", "assets");

// if you want to be able to see php errors set this one to true (otherwise false of course)
define("DEBUGMODE", true);';
            fwrite($configFile, $config);
            fclose($configFile);
            echo "<script>window.location.href='" . $_POST['rootFolder'] . "'</script>"; // redirecting to the same page
        }
        include_once "system/defaults/createConfig.php";
        die(); // simple die to stop the rest of the code :3
    } // end of config existence check
} // end of checkConfig
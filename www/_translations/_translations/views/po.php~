<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php include view("_translations", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <p>Lee los archivos .po</p>
        <?php
        $file = fopen('www/_translations/lang/admin-fr_BE.html', 'r');

        while ($linea = fgets($file)) {

            $linea = trim($linea);

            // remplaza
            $linea = str_replace("<p>", "", $linea);
            $linea = str_replace("</p>", "", $linea);

            $linea = str_replace("<td class='src'  lang='en'>", '"', $linea);
            $linea = str_replace("</td>", '"', $linea);
            $linea = str_replace("<td class='tra'  lang='fr-BE'>", '=>"', $linea);
            $linea = str_replace("</tr>", ',', $linea);
            $linea = str_replace("<tr class='i'>", '', $linea);
            $linea = str_replace("<tr class='comments'>", '', $linea);
            $linea = str_replace("<td colspan='2'><div>", '"', $linea);
            $linea = str_replace("<br>", '"=>null', $linea);
            $linea = str_replace("<tr class='i with-comments'>", '', $linea);
            $linea = str_replace("</div>", '', $linea);
//            $linea = str_replace('"', "'", $linea);

            echo($linea);

            $aux[] = trim($linea);

            $numlinea++;
        }

        $array = array(
//            "Continue"=>"Continuer","Create"=>"Créer",
//            "Create a new Privacy Policy Page"=>"Créer une nouvelle page de politique de confidentialité",
//            "This screen allows you to manage requests to erase or delete personal data."=>"Cet écran vous permet de gérer les demandes d’effacement ou de suppression de données personnelles.",
//            "https://make.wordpress.org/community/organize-event-landing-page/"=>"https://make.wordpress.org/community/organize-event-landing-page/",
//            "Want more events? <a href='%s'>Help organize the next one</a>!"=>"Vous voulez plus d’évènements ? <a href='%s'>Aidez à organiser le prochain</a>  !",
//            "translators: %s: Localized meetup organization documentation URL."=>null","A password reset link was emailed to %s."=>"Un lien de réinitialisation du mot de passe a été envoyé par e-mail à %s.","translators: %s: User's display name."=>null","The setting for %1$s is currently configured as 0, this could cause some problems when trying to upload files through plugin or theme features that rely on various upload methods. It is recommended to configure this setting to a fixed value, ideally matching the value of %2$s, as some upload methods read the value 0 as either unlimited, or disabled."=>"Le réglage pour %1$s est actuellement configuré à 0, ce qui pourrait causer quelques problèmes lorsque vous essayez de téléverser des fichiers par le biais d’extensions ou de thèmes qui dépendent de différentes méthodes de téléversement. Il est recommandé de configurer ce réglage à une valeur fixe, correspondant idéalement à la valeur de %2$s, car certaines méthodes de téléversement lisent la valeur 0 comme étant soit illimitée, soit désactivée.","translators: 1: post_max_size, 2: upload_max_filesize"=>null","Talk to your web host about supporting HTTPS for your website."=>"Contactez votre hébergeur pour la prise en charge HTTPS sur votre site.","Update your site to use HTTPS"=>"Mettre à jour votre site pour utiliser le HTTPS","However, your WordPress Address is currently controlled by a PHP constant and therefore cannot be updated. You need to edit your %1$s and remove or update the definitions of %2$s and %3$s."=>"Votre adresse WordPress est actuellement contrôlée par une constante PHP et ne peut donc pas être mise à jour. Vous devez modifier votre %1$s et supprimer ou mettre à jour les définitions de %2$s et de %3$s.","translators: 1: wp-config.php, 2: WP_HOME, 3: WP_SITEURL"=>null","HTTPS is already supported for your website."=>"Le HTTPS est déjà pris en charge pour votre site.","Your <a href="%1$s">WordPress Address</a> and <a href="%2$s">Site Address</a> are not set up to use HTTPS."=>"Votre <a href="%1$s">adresse WordPress</a> et votre <a href="%2$s">adresse de site</a> ne sont pas configurées pour utiliser le HTTPS.","translators: 1: URL to Settings > General > WordPress Address, 2: URL to"=>nullSettings > General > Site Address."=>null","You are accessing this website using HTTPS, but your <a href="%1$s">WordPress Address</a> and <a href="%2$s">Site Address</a> are not set up to use HTTPS by default."=>"Vous accédez à ce site en utilisant le HTTPS, mais votre <a href="%1$s">adresse WordPress</a> et votre <a href="%2$s">adresse de site</a> ne sont pas configurées pour utiliser le HTTPS par défaut.","translators: 1: URL to Settings > General > WordPress Address, 2: URL to"=>nullSettings > General > Site Address."=>null","Your <a href="%s">Site Address</a> is not set up to use HTTPS."=>"Votre <a href="%s">adresse de site</a> n’est pas configurée pour utiliser le HTTPS.","translators: %s: URL to Settings > General > Site Address."=>null","Learn more about debugging in WordPress."=>"En apprendre plus sur le débogage de WordPress.","Added"=>"Ajouté","Send password reset"=>"Envoyer la réinitialisation du mot de passe","Contact information"=>"Informations de contact","translators: Default privacy policy heading."=>null","Search Results"=>"Résultats de recherche","Invalid request ID when processing personal data to erase."=>"ID non valide lors de la fusion des données personnelles à supprimer.","Invalid request ID when merging personal data to export."=>"ID non valide lors de la fusion des données personnelles à exporter.","Unable to archive the personal data export file (HTML format)."=>"Impossible d’archiver le fichier d’exportation des données personnelles (format HTML).","Unable to archive the personal data export file (JSON format)."=>"Impossible d’archiver le fichier d’exportation des données personnelles (format JSON).","Unable to open personal data export (HTML report) for writing."=>"Impossible d’ouvrir le fichier d’exportation des données personnelles (rapport HTML) en écriture.","Unable to create personal data export folder."=>"Impossible de créer le dossier d’exportation des données personnelles du compte.","Request added successfully."=>"La demande a bien été ajoutée.","Invalid personal data action."=>"Action des données personnelles non valide.","Unable to initiate confirmation for personal data request."=>"Impossible d’initier la confirmation pour la demande de données personnelles.","https://wordpress.org/support/article/update-services/"=>"https://fr.wordpress.org/support/article/update-services/","Your site is running an outdated version of PHP (%s), which should be updated."=>"Votre site utilise une version obsolète de PHP (%s), qui devrait être mise à jour.","translators: %s: The server PHP version."=>null","Your site is running an insecure version of PHP (%s), which should be updated."=>"Votre site utilise une version non sécurisée de PHP (%s), qui devrait être mise à jour.","translators: %s: The server PHP version."=>null","PHP Update Recommended"=>"Mise à jour PHP recommandée","PHP is the programming language used to build and maintain WordPress. Newer versions of PHP are created with increased performance in mind, so you may see a positive effect on your site&#8217;s performance. The minimum recommended version of PHP is %s."=>"PHP est le langage de programmation utilisé pour construire et maintenir WordPress. Les nouvelles versions de PHP sont créées dans le but d’augmenter les performances, vous pouvez donc constater un effet positif sur les performances de votre site. La version minimale recommandée de PHP est %s.","translators: %s: The minimum recommended PHP version."=>null","Your website appears to use Basic Authentication, which is not currently compatible with Application Passwords."=>"Votre site semble utiliser l’authentification basique, qui n’est pas compatible avec les mots de passe d’application.","https://developer.wordpress.org/rest-api/frequently-asked-questions/#why-is-authentication-not-working"=>"https://developer.wordpress.org/rest-api/frequently-asked-questions/#why-is-authentication-not-working","This site appears to be under version control. Automatic updates are disabled."=>"Ce site semble être sous contrôle de version. Les mises à jour automatiques sont désactivées.","You are using a development version of WordPress."=>"Vous utilisez actuellement une version de développement de WordPress.","You can update to the latest nightly build manually:"=>"Vous pouvez mettre à jour vers la dernière version du jour manuellement :","Enable automatic updates for all new versions of WordPress."=>"Activer les mises à jour automatiques pour toutes les nouvelles versions de WordPress.","Switch to automatic updates for maintenance and security releases only."=>"Basculer sur les mises à jour de maintenance et de sécurité uniquement.","Current version: %s"=>"Version actuelle : %s","translators: Current version of WordPress."=>null","Here you can find information about updates, set auto-updates and see what plugins or themes need updating."=>"Ici, vous trouverez des informations sur les mises à jour, vous pourrez mettre en place les mises à jour automatiques et voir les extensions et thèmes qui ont besoin d’être mis à jour.","This site will not receive automatic updates for new versions of WordPress."=>"Ce site ne recevra pas de mise à jour automatique pour les nouvelles versions de WordPress.","This site is automatically kept up to date with maintenance and security releases of WordPress only."=>"Ce site est automatiquement mis à jour avec uniquement les versions de maintenance et de sécurité de WordPress.","This site is automatically kept up to date with each new version of WordPress."=>"Ce site est automatiquement mis à jour avec chaque nouvelle version de WordPress.","WordPress will only receive automatic security and maintenance releases from now on."=>"À partir de maintenant, WordPress ne recevra que les mises à jour automatiques de sécurité et de maintenance.","Automatic updates for all WordPress versions have been enabled. Thank you!"=>"Les mises à jour automatiques de toutes les nouvelles versions de WordPress ont été activées. Merci !","<strong>Site Health Status</strong> &mdash; Informs you of any potential issues that should be addressed to improve the performance or security of your website."=>"<strong>Santé du site</strong> &mdash; Vous informe de tout problème potentiel qui devrait être résolu pour améliorer les performances ou la sécurité de votre site.","Your new password for %s is:"=>"Votre nouveau mot de passe %s est :",
//                "translators: %s: Application name."=>null"
        );

        fclose($file);
        ?>





        <?php
//        $file = fopen('www/_translations/lang/admin-fr_BE.po', 'r');
//        $tr = array("one" => "uno");
//        $tr["two"] = "dos";
//        vardump($tr);
//        while ($linea = fgets($file)) {
//            $inicio = substr($linea, 0, 1);
//            $text = (substr($linea, 0, 6) == 'msgid ') ? substr($linea, 7, -2) : '';
//          //  $translation = (substr($linea, 0, 7) == 'msgstr ') ? substr($linea, 8, -2) : '';
//            if ($inicio !== '#' ) {
//                $tr[$text] = $translation;
//                echo $linea . '<br/>';
//                $aux[] = $linea;
//                $numlinea++;
//            }
//        }
//        vardump($tr);
//        fclose($file);
//        vardump($file);
        ?>




    </div>
</div>

<?php include view("home", "footer"); ?> 


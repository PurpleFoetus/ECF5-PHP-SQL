<?php
$title = "B.log - RGPD";
require_once "./src/partials/header.php";
?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container rgpd-container">
            <h1>Conditions et protection des données</h1>
            <p class="terms">
                Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé
                par [identité et coordonnées du responsable de traitement] pour [finalités du traitement].
                La base légale du traitement est [base légale du traitement].
                Les données collectées seront communiquées aux seuls destinataires suivants : [destinataires des données].
            </p>
            <p class="terms">
                Les données sont conservées pendant [durée de conservation des données prévue par le responsable du traitement ou critères permettant de la déterminer].
            </p>
            <p class="terms">
                Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données.
                (en fonction de la base légale du traitement, mentionner également : Vous pouvez retirer à tout moment votre consentement au traitement de vos données ;
                Vous pouvez également vous opposer au traitement de vos données ; Vous pouvez également exercer votre droit à la portabilité des données)
            </p>
            <p class="terms">
                Consultez le site cnil.fr pour plus d’informations sur vos droits.
            </p>
            <p class="terms">
                Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez contacter (le cas échéant, notre délégué à la protection des données ou le service chargé de l’exercice de ces droits) :
                [adresse électronique, postale, coordonnées téléphoniques, etc.].
            </p>
            <p class="terms">
                Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL.
            </p>
        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>
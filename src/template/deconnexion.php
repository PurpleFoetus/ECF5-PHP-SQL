<?php
if (isset($_SESSION["user_mail"])) {
    unset($_SESSION["user_mail"]);
}
header("Location: /Blog-AFPA-ECF4");

<?php

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = '6LfbQwwTAAAAAG6VFGH1CeI73qnCr97UzZRmOXu4';

// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = 'en';

?>

<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>

<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
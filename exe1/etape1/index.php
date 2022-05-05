<?php
    require 'form.php';

    echo 'Welcom';

    $form = new Form ('form.php', 'post');
    $form -> formHTML();
    $form -> inputTxtHTML('name', 'State your name :');
    $form -> selectHTML('food', 'pizza', 'pasta', 'tacos', 'ramen');
    $form -> textareaHTML('description', 'Describe yourself :');
    $form -> radioBtnHtml('answer', 'Pinneapple on pizza ?', 'yes', 'no');
    $form -> checkboxHTML('flavour', 'Choose your icecream flavour :', 'chocolate', 'mint', 'vanilla');
    $form -> submitHTML('submit', 'Submit');
    $form -> formEndHTML();
?>
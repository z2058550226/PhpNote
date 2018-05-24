<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 12:02
 */

require_once "HTML/QuickForm2.php";
require_once "HTML/QuickForm2/Renderer.php";

$languages = array(
    '' => 'Choose language',
    'C#' => 'C#',
    'JavaScript' => 'JavaScript',
    'Perl' => 'Perl',
    'PHP' => 'PHP'
);

try {

    $form = new HTML_QuickForm2('languages', 'POST');

    $fieldSet = $form->addFieldset()->setLabel("Your developer profile");

    $name = $fieldSet->addText('name')->setLabel('Your Name.');

    $name->addRule('required', 'Please provide your name.');

    $email = $fieldSet->addText('email')->setLabel('Your E-mail Address');

    $languages = $fieldSet->addSelect('language', null, array('options' => $languages));

    $languages->setLabel("Choose your favorite programing language:");

    $languages->addRule('required', 'Please choose a programing language.');

    $fieldSet->addElement('submit', null, 'Submit!');

    if ($form->validate()) {
        echo "<p>SUCCESS</p>";
    }

    $renderer = HTML_QuickForm2_Renderer::factory('default')->setOption(array('group_errors' => true));

    echo $form->render($renderer);

} catch (HTML_QuickForm2_InvalidArgumentException $e) {
} catch (HTML_QuickForm2_NotFoundException $e) {
}


<?php

//region gravity form hooks
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form)
{
  $form_button_text = @$form['button']['text'];

  return "<button class='button gform_button theme-cta-button' id='gform_submit_button_{$form['id']}' aria-label='
Submit Form'>$form_button_text</button>";
}

add_filter('gform_confirmation_anchor', '__return_false');
//endregion gravity form hooks

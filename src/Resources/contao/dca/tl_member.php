<?php

use Bcs\MemberReset\Service\MemberResetCallbacks;

$GLOBALS['TL_DCA']['tl_member']['list']['operations']['resetpw'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['resetpw'],
    'href'  => 'key=resetpw',
    'icon'  => 'mgroup.svg', // use a proper email icon in your theme
    'button_callback' => [MemberResetCallbacks::class, 'addResetIcon']
];

// Bulk action
$GLOBALS['TL_DCA']['tl_member']['list']['global_operations']['resetpw_bulk'] = [
    'label'      => &$GLOBALS['TL_LANG']['tl_member']['bulk_resetpw'],
    'href'       => 'act=resetpw_bulk',
    'class'      => 'header_resetpw',
    'attributes' => 'onclick="if(!confirm(\'Really send reset email(s)?\'))return false;"'
];

// Add button to login details
$GLOBALS['TL_DCA']['tl_member']['fields']['resetpw_button'] = [
    'input_field_callback' => [MemberResetCallbacks::class, 'addResetButton']
];

$GLOBALS['TL_DCA']['tl_member']['palettes']['default'] = str_replace(
    'password',
    'password,resetpw_button',
    $GLOBALS['TL_DCA']['tl_member']['palettes']['default']
);

<?php

// Add Member Reset Email fields
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{member_reset_legend},memberResetPage,memberResetSenderName,memberResetSenderEmail,memberResetSubject,memberResetBody';

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberResetPage'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberResetPage'],
    'inputType' => 'pageTree',
    'eval'      => ['fieldType'=>'radio', 'tl_class'=>'clr'],
    'sql'       => "int(10) unsigned NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberResetSenderName'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberResetSenderName'],
    'inputType' => 'text',
    'eval'      => ['maxlength'=>255, 'tl_class'=>'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberResetSenderEmail'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberResetSenderEmail'],
    'inputType' => 'text',
    'eval'      => ['rgxp'=>'email', 'maxlength'=>255, 'tl_class'=>'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberResetSubject'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberResetSubject'],
    'inputType' => 'text',
    'eval'      => ['maxlength'=>255, 'tl_class'=>'clr long'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberResetBody'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberResetBody'],
    'inputType' => 'textarea',
    'eval'      => ['rows'=>6, 'tl_class'=>'clr', 'decodeEntities'=>true],
    'sql'       => "text NULL"
];

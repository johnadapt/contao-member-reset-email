<?php

namespace Bcs\MemberReset\Service;

use Contao\Backend;
use Contao\Input;
use Contao\MemberModel;

class MemberResetCallbacks extends Backend
{
    public function addResetIcon($row, $href, $label, $title, $icon, $attributes)
    {
        return '<a href="' . $this->addToUrl($href . '&id=' . $row['id']) . '" title="' . $title . '"' . $attributes . '>'
            . \Image::getHtml('send.svg', $label) . '</a> ';
    }

    public function addResetButton($dc)
    {
        if (Input::post('resetpw')) {
            $member = MemberModel::findByPk($dc->id);
            if ($member) {
                $mailer = new ResetMailer();
                $mailer->sendResetEmail($member);
            }
        }

        return $this->parseTemplate('be_member_reset');
    }
}

<?php

namespace Bcs\MemberReset\Service;

use Contao\Config;
use Contao\Email;
use Contao\MemberModel;
use Contao\PageModel;
use Contao\System;
use Contao\CoreBundle\OptIn\OptIn;

class ResetMailer
{
    public function sendResetEmail(MemberModel $member): bool
    {
        $container = System::getContainer();
        $optIn     = $container->get('contao.opt_in');
        $token     = $optIn->create('pwreset', $member->email, ['tl_member' => $member->id]);

        $resetPage = Config::get('memberResetPage');
        if (!$resetPage) {
            return false;
        }

        $page = PageModel::findByPk($resetPage);
        if (!$page) {
            return false;
        }

        $resetLink = $page->getAbsoluteUrl() . '?token=' . $token->getIdentifier();

        // Subject & body
        $subject = Config::get('memberResetSubject') ?: 'Password Reset Request';
        $bodyTpl = Config::get('memberResetBody') ?: "Hello ##firstname##,\n\nClick here to reset your password:\n##reset_link##";

        $replacements = [
            '##firstname##' => $member->firstname,
            '##lastname##'  => $member->lastname,
            '##username##'  => $member->username,
            '##reset_link##'=> $resetLink,
        ];

        $body = strtr($bodyTpl, $replacements);

        try {
            // Try Notification Center first
            if ($container->has('notification_center.gateway')) {
                // replicate NC logic if needed (kept simple here)
            }

            // Fallback to Email
            $email = new Email();
            $email->from     = Config::get('memberResetSenderEmail') ?: Config::get('adminEmail');
            $email->fromName = Config::get('memberResetSenderName') ?: 'System';
            $email->subject  = $subject;
            $email->text     = $body;
            $email->sendTo($member->email);

            return true;
        } catch (\Exception $e) {
            System::log('ResetMailer failed: ' . $e->getMessage(), __METHOD__, TL_ERROR);
            return false;
        }
    }
}

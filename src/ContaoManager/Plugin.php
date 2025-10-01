<?php

namespace Bcs\MemberReset\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Bcs\MemberReset\ContaoMemberResetEmail;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoMemberResetEmail::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
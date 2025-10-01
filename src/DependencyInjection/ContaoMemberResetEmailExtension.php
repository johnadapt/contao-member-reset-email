<?php

namespace Bcs\MemberReset\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ContaoMemberResetEmailExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // no special services.yaml needed, autoloaded via PSR-4
    }
}
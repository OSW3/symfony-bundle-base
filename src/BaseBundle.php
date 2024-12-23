<?php 
namespace OSW3\Base;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OSW3\Base\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BaseBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $projectDir = $container->getParameter('kernel.project_dir');
        (new Configuration)->generateProjectConfig($projectDir);
    }
}
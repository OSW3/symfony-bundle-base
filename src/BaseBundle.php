<?php 
namespace OSW3\BundleBase;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OSW3\BundleBase\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BaseBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $projectDir = $container->getParameter('kernel.project_dir');
        (new Configuration)->generateProjectConfig($projectDir);
    }
}
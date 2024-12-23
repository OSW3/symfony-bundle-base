<?php 
namespace OSW3\DemoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OSW3\DemoBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DemoBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $projectDir = $container->getParameter('kernel.project_dir');
        (new Configuration)->generateProjectConfig($projectDir);
    }
}
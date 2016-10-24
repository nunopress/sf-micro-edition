<?php

use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Bundle\DebugBundle\DebugBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

/**
 * Class MicroKernel
 */
class MicroKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * Register all your bundles here
     *
     * @return array
     */
    public function registerBundles()
    {
        // Production bundles
        $bundles = [
            // Required bundles
            new FrameworkBundle(),
            new SensioFrameworkExtraBundle(),
            new TwigBundle(),

            // Extra bundles
            new \VendorName\ProjectNameBundle\VendorNameProjectNameBundle()
        ];

        // Development bundles
        if ('prod' != $this->getEnvironment()) {
            $bundles[] = new WebProfilerBundle();
            $bundles[] = new DebugBundle();
        }

        return $bundles;
    }

    /**
     * Configure your routes here
     *
     * @param RouteCollectionBuilder $routes
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // Production routes
        $routes->import('@VendorNameProjectNameBundle/Controller', '/', 'annotation');

        // Development routes
        if ('prod' != $this->getEnvironment()) {
            $routes->import('@WebProfilerBundle/Resources/config/routing/wdt.xml', '/_wdt');
            $routes->import('@WebProfilerBundle/Resources/config/routing/profiler.xml', '/_profiler');
        }
    }

    /**
     * Configure your configuration files here
     *
     * @param ContainerBuilder $c
     * @param LoaderInterface $loader
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        // MicroKernel configuration
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
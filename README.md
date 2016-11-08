Symfony Micro Edition
=====================

Welcome to the Symfony Micro Edition - a stripped version of Symfony Standard Edition that you can use as the 
skeleton for your new Api/Small applications.

For install is really simple with Composer:

`composer create-project nunopress/sf-micro-edition project_name`

Difference from Standard Edition?
---------------------------------

I made the stripped/small version of Standard Edition with the new MicroKernel trait.

In the few first releases I made a personal version of this, but I get some feedback so I choose to come back to 
the Standard Edition and stripped for make more simple and fast.

The result is really nice, fast response, same folders, same code (_made only difference on Kernel_) and you 
ready to come back to standard edition easy, you need only to add into composer the other default packages and 
replace the MicroKernel and MicroCache with AppKernel and AppCache Standard Edition.

What's inside?
--------------

The Symfony Micro Edition is configured with the following defaults:

  * MicroKernel and MicroCache instead of full Symfony Kernel;
  
  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Annotations enabled for everything.
  
  * Translator enabled with base configuration.
  
  * Http Cache enabled with base configuration.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Micro Edition are released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/current/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[8]:  https://symfony.com/doc/current/templating.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
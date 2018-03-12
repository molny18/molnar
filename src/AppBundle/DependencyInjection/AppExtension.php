<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.02.28.
 * Time: 15:44
 */
declare(strict_types=1);

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration= new Configuration();
        $config=$this->processConfiguration($configuration,$configs);

        $loader= new Loader\YamlFileLoader($container,new FileLocator(__DIR__.'/../Resources/config'));
//        $loader->load('services.yml');

        if(!empty($config['music_parser'])){
            $this->registerMusicParserSection($config['music_parser'],$container);
        }
    }

    private function registerMusicParserSection(array $config, ContainerBuilder $container): void
    {
//        if(!empty($config['music_directory'])){
//            $parser= $container->getDefinition('app.music_message_parser');
//            $parser->addMethodCall('setDir',[$config['music_directory']]);
//        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 18:30
 */
declare(strict_types=1);

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder= new TreeBuilder();
        $rootNode= $treeBuilder->root('appbundle_service');
        $this->addMusicParserSection($rootNode);

        return $treeBuilder;
    }

    public function addMusicParserSection(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('music_parser')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('music_directory')
                    ->defaultValue('/app/sample/music')
                    ->info('the app music libary')
                    ->end()
                ->end()
            ->end()
        ->end();

    }
}
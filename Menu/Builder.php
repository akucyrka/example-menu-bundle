<?php

namespace akucyrka\ExampleMenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $opcje = $em->getRepository('akucyrkaExampleMenuBundle:Menu')->findAll();
        foreach ($opcje as $o) {
            $menu->addChild($o->getTitle(), array(
                'route' => '_menu_show',
                'routeParameters' => array('slug' => $o->getSlug())
            ));
        }

        return $menu;
    }
}
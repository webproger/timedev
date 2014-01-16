<?php

namespace TDT\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class SiteMenu extends ContainerAware
{
    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function main(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('site_main');
        $menu->setChildrenAttribute('class', isset($options['class']) ? $options['class'] : 'nav');
        $menu->addChild('Главная',     ['route' => 'tdt_site_index']);
        $menu->addChild('О сайте',     ['route' => 'tdt_site_about']);
        $menu->addChild('Контакты',     ['route' => 'tdt_site_contacts']);
        $menu->addChild('Blog',     ['route' => 'smart_blog_index']);
        $menu->addChild('News',     ['route' => 'tdt_news_index']);
        $menu->addChild('Gallery',  ['route' => 'smart_gallery_index']);

        if (true === $this->container->get('security.context')->isGranted('ROLE_BLOGGER')) {
            $menu->addChild('Create Article', ['route' => 'smart_blog_article_create']);
        }

        if (true === $this->container->get('security.context')->isGranted('ROLE_NEWSMAKER')) {
            $menu->addChild('Create News', ['route' => 'tdt_news_article_create']);
        }

        if (true === $this->container->get('security.context')->isGranted('ROLE_ADMIN')) {
            $menu->addChild('Admin', ['route' => 'tdt_site_admin']);
        }

        return $menu;
    }
}

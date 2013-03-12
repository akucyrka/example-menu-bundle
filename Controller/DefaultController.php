<?php

namespace akucyrka\ExampleMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

 /**
* @Route("/{slug}.html", name="_menu_show")
* @Template()
*/
    public function showMenuAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $opcja = $em->getRepository('akucyrkaExampleMenuBundle:Menu')->findOneBySlug($slug);
        if (!$opcja) {
            $this->createNotFoundException('aaa...');
        }
        return array('opcja' => $opcja);
    }
}

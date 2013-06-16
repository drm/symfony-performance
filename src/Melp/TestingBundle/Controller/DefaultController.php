<?php

namespace Melp\TestingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
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
     * @Route("/real/{name}")
     * @Template
     */
    public function dbAction($name, $em = null)
    {
        // this piece is here to use the same action for an optimized and non optimized version
        if (null === $em) {
            $em = $this->get('doctrine.orm.default_entity_manager'); //getDoctrine()->getManager();
        }

        $profile = $em->getRepository('Melp\TestingBundle\Entity\Profile')->findOneByName($name);

        if (!$profile) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("Invalid profile");
        }
        return array(
            'real_name' => $profile->getRealName()
        );
    }
}

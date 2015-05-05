<?php

namespace TeamRH\Bundle\IntraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use TeamRH\Bundle\IntraBundle\Entity\User;


/**
 * @Route("/home")
 * @Template()
 */
class HomeController extends Controller
{

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array(
        );
    }
    
    /**
     * @Route("/register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager(); //Connexion BDD avec Doctrine
        $factory = $this->get('security.encoder_factory'); //On cherche le service de security pour encoder le mot de passe
        $user = new User(); //Création d'un utilisateur vide pour la création
        
        $form = $this->createForm('teamrh_bundle_intrabundle_user', $user); //Création du formulaire via le service associé via Usertype
        
        $form->handleRequest($request); //Remplacement de la méthode dépréciée getRequest()
        
        if ($form->isValid()) {
            $user = $form->getData(); //On bind les données du formulaire dans notre objet User
            
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            
            $em->persist($user);
            $em->flush();
            
            return $this->redirect($this->generateUrl('teamrh_intra_home_index')); //Redirection vers l'URL de la homepage
        }
        
        return array(
            'form' => $form->createView(),
        );
    }

}

<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProjetController extends Controller
{
    
    public function indexaccueilAction()
    {
        return $this->render('ProjetBundle:Projet:indexaccueil.html.twig');
    }

    public function indexconseilAction()
    {
        return $this->render('ProjetBundle:Projet:indexconseil.html.twig');
    }

    public function shopAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $medicaments = $em->getRepository('ProjetBundle:Medicament')->findAll();
        $categories = $em->getRepository('ProjetBundle:Categorie')->findAll();
        return $this->render('ProjetBundle:Projet:shop.html.twig',array(
          'medicaments' => $medicaments,
          'categories' => $categories
        ));
    }

    public function productDetailsAction($id)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $medicament = $em->getRepository('ProjetBundle:Medicament')->find($id);
      $categories = $em->getRepository('ProjetBundle:Categorie')->findAll();
      return $this->render('ProjetBundle:Projet:medicament.html.twig',array(
        'medicament' => $mesicament,
        'categories' => $categories,
      ));
    }

    public function categorieProductsAction($id)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $categorie = $em->getRepository('ProjetBundle:Categorie')->find($id);
      $categories = $em->getRepository('ProjetBundle:Categorie')->findAll();
      $medicaments = $categorie->getMedicaments();
      return $this->render('ProjetBundle:Projet:categorie.html.twig',array(
        'medicaments' => $medicaments,
        'categorieAc' => $categorie,
        'categories' => $categories
      ));
    }


    public function cartAction(Request $request){

        $session = $request->getSession();
        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');
  
        $em = $this->getDoctrine()->getEntityManager();
        $medicaments = $em->getRepository('ProjetBundle:Medicament')->findBy(array('id' => array_keys($panier)));
        return $this->render('ProjetBundle:Cart:cart.html.twig',array(
          'medicaments' => $medicaments,
          'panier' => $panier
        ));
      }
  
      public function addCartAction($id,Request $request){
  
          $session = $request->getSession();
          
          if (!$session->has('panier')) $session->set('panier',array());
          $panier = $session->get('panier');
          
          if (array_key_exists($id, $panier)) {
              if ($request->query->get('qte') != null) $panier[$id] = $request->query->get('qte');
          } else {
              if ($request->query->get('qte') != null)
                  $panier[$id] = $request->query->get('qte');
              else
                  $panier[$id] = 1;
            }
              
          $session->set('panier',$panier);
          
          
          return $this->redirect($this->generateUrl('projet_cart'));
  
      }
  
  
      public function deleteCartAction($id,Request $request){
  
          $session = $request->getSession();
          
          $panier = $session->get('panier');
  
          if(array_key_exists($id,$panier)){
            unset($panier[$id]);
            $session->set('panier',$panier);
          }
          return $this->redirect($this->generateUrl('projet_cart'));
      }
  
      public function clearCartAction(Request $request){
          $session = $request->getSession();
          
          $session->clear();
          if (!$session->has('panier')) $session->set('panier',array());
          $panier = $session->get('panier');
          $session->set('panier',$panier);
          return $this->redirect($this->generateUrl('projet_cart'));
      }
  
  
      public function checkoutAction(Request $request)
      {
          
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $session = $request->getSession();
        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');
  
        $em = $this->getDoctrine()->getEntityManager();
        $medicaments = $em->getRepository('ProjetBundle:Medicament')->findBy(array('id' => array_keys($panier)));
        return $this->render('ProjetBundle:Checkout:checkout.html.twig',array(
          'medicaments' => $medicaments,
          'panier' => $panier,
        ));
      }
  
}

<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\Pharmacie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pharmacie controller.
 *
 * @Route("pharmacie")
 */
class PharmacieController extends Controller
{
    /**
     * Lists all pharmacie entities.
     *
     * @Route("/", name="pharmacie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pharmacies = $em->getRepository('ProjetBundle:Pharmacie')->findAll();

        return $this->render('pharmacie/index.html.twig', array(
            'pharmacies' => $pharmacies,
        ));
    }

    /**
     * Creates a new pharmacie entity.
     *
     * @Route("/new", name="pharmacie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pharmacie = new Pharmacie();
        $form = $this->createForm('ProjetBundle\Form\PharmacieType', $pharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pharmacie);
            $em->flush();

            return $this->redirectToRoute('pharmacie_show', array('id' => $pharmacie->getId()));
        }

        return $this->render('pharmacie/new.html.twig', array(
            'pharmacie' => $pharmacie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pharmacie entity.
     *
     * @Route("/{id}", name="pharmacie_show")
     * @Method("GET")
     */
    public function showAction(Pharmacie $pharmacie)
    {
        $deleteForm = $this->createDeleteForm($pharmacie);

        return $this->render('pharmacie/show.html.twig', array(
            'pharmacie' => $pharmacie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pharmacie entity.
     *
     * @Route("/{id}/edit", name="pharmacie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pharmacie $pharmacie)
    {
        $deleteForm = $this->createDeleteForm($pharmacie);
        $editForm = $this->createForm('ProjetBundle\Form\PharmacieType', $pharmacie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pharmacie_show', array('id' => $pharmacie->getId()));
        }

        return $this->render('pharmacie/edit.html.twig', array(
            'pharmacie' => $pharmacie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pharmacie entity.
     *
     * @Route("/{id}", name="pharmacie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pharmacie $pharmacie)
    {
        $form = $this->createDeleteForm($pharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pharmacie);
            $em->flush();
        }
        return $this->redirectToRoute('pharmacie_index');
    }

    /**
     * Creates a form to delete a pharmacie entity.
     *
     * @param Pharmacie $pharmacie The pharmacie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pharmacie $pharmacie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pharmacie_delete', array('id' => $pharmacie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function searchAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $pharmacies=$em->getRepository('ProjetBundle:Pharmacie')->findAll();
        if($request->isMethod('POST')){
            $id=$request->get('id');
            $pharmacies=$em->getRepository('ProjetBundle:Pharmacie')->findBy(array('id'=>$id));
        }
        return $this->render('pharmacie\search.html.twig',array('pharmacies'=>$pharmacies));
    }
}

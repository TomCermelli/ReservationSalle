<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Horaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Horaire controller.
 *
 * @Route("horaire")
 */
class HoraireController extends Controller
{
    /**
     * Lists all horaire entities.
     *
     * @Route("/", name="horaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $horaires = $em->getRepository('AppBundle:Horaire')->findAll();

        return $this->render('horaire/index.html.twig', array(
            'horaires' => $horaires,
        ));
    }

    /**
     * Creates a new horaire entity.
     *
     * @Route("/new", name="horaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $horaire = new Horaire();
        $form = $this->createForm('AppBundle\Form\HoraireType', $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaire);
            $em->flush();

            return $this->redirectToRoute('horaire_show', array('id' => $horaire->getId()));
        }

        return $this->render('horaire/new.html.twig', array(
            'horaire' => $horaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a horaire entity.
     *
     * @Route("/{id}", name="horaire_show")
     * @Method("GET")
     */
    public function showAction(Horaire $horaire)
    {
        $deleteForm = $this->createDeleteForm($horaire);

        return $this->render('horaire/show.html.twig', array(
            'horaire' => $horaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing horaire entity.
     *
     * @Route("/{id}/edit", name="horaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Horaire $horaire)
    {
        $deleteForm = $this->createDeleteForm($horaire);
        $editForm = $this->createForm('AppBundle\Form\HoraireType', $horaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('horaire_edit', array('id' => $horaire->getId()));
        }

        return $this->render('horaire/edit.html.twig', array(
            'horaire' => $horaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a horaire entity.
     *
     * @Route("/{id}", name="horaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Horaire $horaire)
    {
        $form = $this->createDeleteForm($horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($horaire);
            $em->flush();
        }

        return $this->redirectToRoute('horaire_index');
    }

    /**
     * Creates a form to delete a horaire entity.
     *
     * @param Horaire $horaire The horaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Horaire $horaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('horaire_delete', array('id' => $horaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

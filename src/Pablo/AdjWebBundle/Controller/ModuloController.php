<?php

namespace Pablo\AdjWebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pablo\AdjWebBundle\Entity\Modulo;
use Pablo\AdjWebBundle\Form\ModuloType;

/**
 * Modulo controller.
 *
 */
class ModuloController extends Controller
{
    /**
     * Lists all Modulo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PabloAdjWebBundle:Modulo')->findAll();

        return $this->render('PabloAdjWebBundle:Modulo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Modulo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Modulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modulo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Modulo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Modulo entity.
     *
     */
    public function newAction()
    {
        $entity = new Modulo();
        $form   = $this->createForm(new ModuloType(), $entity);

        return $this->render('PabloAdjWebBundle:Modulo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Modulo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Modulo();
        $form = $this->createForm(new ModuloType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modulo_show', array('id' => $entity->getId())));
        }

        return $this->render('PabloAdjWebBundle:Modulo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modulo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Modulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modulo entity.');
        }

        $editForm = $this->createForm(new ModuloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Modulo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Modulo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Modulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modulo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ModuloType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modulo_edit', array('id' => $id)));
        }

        return $this->render('PabloAdjWebBundle:Modulo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Modulo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PabloAdjWebBundle:Modulo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Modulo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('modulo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function listmodulosusuarioAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$usuarioId = 0;
    	$entities = $em->getRepository('PabloAdjWebBundle:Modulo')->listModulosUsuario($usuarioId);
    	
    	return $this->render('PabloAdjWebBundle:Modulo:menu.htm.twig', array(
    			'entities' => $entities,
    	));
    }
}

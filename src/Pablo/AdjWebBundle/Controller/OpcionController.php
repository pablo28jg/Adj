<?php

namespace Pablo\AdjWebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pablo\AdjWebBundle\Entity\Opcion;
use Pablo\AdjWebBundle\Form\OpcionType;

/**
 * Opcion controller.
 *
 */
class OpcionController extends Controller
{
    /**
     * Lists all Opcion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PabloAdjWebBundle:Opcion')->findAll();

        return $this->render('PabloAdjWebBundle:Opcion:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Opcion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Opcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Opcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Opcion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Opcion entity.
     *
     */
    public function newAction()
    {
        $entity = new Opcion();
        $form   = $this->createForm(new OpcionType(), $entity);

        return $this->render('PabloAdjWebBundle:Opcion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Opcion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Opcion();
        $form = $this->createForm(new OpcionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('opcion_show', array('id' => $entity->getId())));
        }

        return $this->render('PabloAdjWebBundle:Opcion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Opcion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Opcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Opcion entity.');
        }

        $editForm = $this->createForm(new OpcionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Opcion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Opcion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Opcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Opcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OpcionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('opcion_edit', array('id' => $id)));
        }

        return $this->render('PabloAdjWebBundle:Opcion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Opcion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PabloAdjWebBundle:Opcion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Opcion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('opcion'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;      
    }
    
    public function listopcionesmoduloAction($moduloId)
    {
    	$em = $this->getDoctrine()->getManager();    	
    	$entities = $em->getRepository('PabloAdjWebBundle:Opcion')->listOpcionesModulo($moduloId);
    	 
    	return $this->render('PabloAdjWebBundle:Opcion:menu.htm.twig', array(
    			'entities' => $entities,
    	));
    }
}

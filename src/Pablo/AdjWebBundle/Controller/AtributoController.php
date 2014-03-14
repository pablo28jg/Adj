<?php

namespace Pablo\AdjWebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pablo\AdjWebBundle\Entity\Atributo;
use Pablo\AdjWebBundle\Form\AtributoType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Atributo controller.
 *
 */
class AtributoController extends Controller
{
    /**
     * Lists all Atributo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PabloAdjWebBundle:Atributo')->findAll();

        return $this->render('PabloAdjWebBundle:Atributo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Atributo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Atributo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Atributo entity.
     *
     */
    public function newAction()
    {
        $entity = new Atributo();
        $form   = $this->createForm(new AtributoType(), $entity);

        return $this->render('PabloAdjWebBundle:Atributo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Atributo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Atributo();
        $form = $this->createForm(new AtributoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atributo_show', array('id' => $entity->getId())));
        }

        return $this->render('PabloAdjWebBundle:Atributo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Atributo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $editForm = $this->createForm(new AtributoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PabloAdjWebBundle:Atributo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Atributo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PabloAdjWebBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AtributoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atributo_edit', array('id' => $id)));
        }

        return $this->render('PabloAdjWebBundle:Atributo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Atributo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PabloAdjWebBundle:Atributo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Atributo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('atributo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function listAtributosOpcionAction($opcionId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$usuarioId = 0;
    	$entities = $em->getRepository('PabloAdjWebBundle:Atributo')->listAtributosOpcion($opcionId);
    	 
    	return $this->render('PabloAdjWebBundle:Atributo:menu.htm.twig', array(
    			'entities' => $entities,
    	));
    }
    
    public function listAtributosJsonAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$entities = $em->getRepository('PabloAdjWebBundle:Atributo')->listAtributos();
    
    	$serializer = $this->get('serializer');
    	 
    	$json = $serializer->serialize($entities, 'json');
    	$response = new Response($json);
    	return $response;
    }
}

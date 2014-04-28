<?php

namespace Pablo\AdjWebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pablo\AdjWebBundle\Entity\Opcion;
use Pablo\AdjWebBundle\Form\OpcionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Pablo\AdjWebBundle\Entity\OpcionAtributo;
//use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
//use Symfony\Component\HttpFoundation\JsonResponse;


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
    
    public function listAtributosOpcionJsonAction($opcionId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$entities = $em->getRepository('PabloAdjWebBundle:Atributo')->listAtributosOpcion($opcionId);  
    	
    	$serializer = $this->get('serializer');    	 
    	
    	$serializedCities = array();
    	foreach ($entities as $enti) {
    		//$Atributo = $enti->Nombre;//getAtributoId();
    		$serializedCities[] = array(    	
    				"OpcionId" => $opcionId,	
    				"Atributo" => $enti['Nombre'],
    				"Src" => $enti['Src'],
    		);
    	}
    	
    	$json = $serializer->serialize($serializedCities, 'json');
    	$response = new Response($json);
    	return $response;
    }  

    public function saveAtributosOpcionJsonAction(Request $request)
    {      	
    	$saved = false;
    	$Atributo= "";
    	if($request->getMethod() == 'POST') 
    	{
    		$data = $_POST['data'];
    		$OpcionId = $_POST['OpcionId'];
    	} 
    	if(is_array($data))
    	{
    		foreach($data as $dato)
    		{
    			if($dato["Atributo"] != '')
    			{
    				$em = $this->getDoctrine()->getManager();
    				$atributoId = $em->getRepository('PabloAdjWebBundle:Atributo')->findOneBy(array("Nombre" => $dato['Atributo']));    				
    					$opcionId = $em->getRepository('PabloAdjWebBundle:Opcion')->find($OpcionId);
    				$entity = $em->getRepository('PabloAdjWebBundle:OpcionAtributo')->findOneBy(array(
    						"AtributoId" => $atributoId ,"OpcionId" => $opcionId));
    				if ($entity)
    				{
    					$entity->setSrc($dato['Src']);
    					$em->persist($entity);
    					$em->flush();
    				}
    				else 
    				{    					
    					$entity = new OpcionAtributo();
    					$entity->setOpcionId($opcionId);
    					$entity->setAtributoId($atributoId);
    					$entity->setSrc($dato['Src']);
    					$em->persist($entity);
    					$em->flush();
    				}    				
    				//$Atributo = $dato['Atributo'];
    				$saved = true;
    			}
    		}		
    	}
    	$serializedCities = array("result" => $saved);
    	$serializer = $this->get('serializer');
    	$json = $serializer->serialize($serializedCities, 'json');
    	$response = new Response($json);
    	return $response;
    }
}

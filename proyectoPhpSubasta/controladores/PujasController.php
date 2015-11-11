<?php

namespace Milo\SaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Milo\SaleBundle\Entity\Pujas;
use Milo\SaleBundle\Form\PujasType;

/**
 * Pujas controller.
 *
 */
class PujasController extends Controller
{

    /**
     * Lists all Pujas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MiloSaleBundle:Pujas')->findAll();

        return $this->render('MiloSaleBundle:Pujas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pujas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pujas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pujas_show', array('id' => $entity->getId())));
        }

        return $this->render('MiloSaleBundle:Pujas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pujas entity.
     *
     * @param Pujas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pujas $entity)
    {
        $form = $this->createForm(new PujasType(), $entity, array(
            'action' => $this->generateUrl('pujas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pujas entity.
     *
     */
    public function newAction()
    {
        $entity = new Pujas();
        $form   = $this->createCreateForm($entity);

        return $this->render('MiloSaleBundle:Pujas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pujas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiloSaleBundle:Pujas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pujas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MiloSaleBundle:Pujas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pujas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiloSaleBundle:Pujas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pujas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MiloSaleBundle:Pujas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pujas entity.
    *
    * @param Pujas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pujas $entity)
    {
        $form = $this->createForm(new PujasType(), $entity, array(
            'action' => $this->generateUrl('pujas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pujas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiloSaleBundle:Pujas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pujas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pujas_edit', array('id' => $id)));
        }

        return $this->render('MiloSaleBundle:Pujas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pujas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MiloSaleBundle:Pujas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pujas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pujas'));
    }

    /**
     * Creates a form to delete a Pujas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pujas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

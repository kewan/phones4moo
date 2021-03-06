<?php

namespace Phones4Moo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phones4Moo\StoreBundle\Entity\Feature;
use Phones4Moo\AdminBundle\Form\FeatureType;

/**
 * Feature controller.
 *
 * @Route("/feature")
 */
class FeatureController extends Controller
{

    /**
     * Lists all Feature entities.
     *
     * @Route("/", name="feature")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Phones4MooStoreBundle:Feature')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Feature entity.
     *
     * @Route("/", name="feature_create")
     * @Method("POST")
     * @Template("Phones4MooAdminBundle:Feature:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Feature();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice', "Feature created!"
            );

            return $this->redirect($this->generateUrl('feature'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Feature entity.
    *
    * @param Feature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Feature $entity)
    {
        $form = $this->createForm(new FeatureType(), $entity, array(
            'action' => $this->generateUrl('feature_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Feature entity.
     *
     * @Route("/new", name="feature_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Feature();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to edit an existing Feature entity.
     *
     * @Route("/{id}/edit", name="feature_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Phones4MooStoreBundle:Feature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feature entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Feature entity.
    *
    * @param Feature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Feature $entity)
    {
        $form = $this->createForm(new FeatureType(), $entity, array(
            'action' => $this->generateUrl('feature_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Feature entity.
     *
     * @Route("/{id}", name="feature_update")
     * @Method("PUT")
     * @Template("Phones4MooAdminBundle:Feature:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Phones4MooStoreBundle:Feature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feature entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice', "Feature updated!"
            );

            return $this->redirect($this->generateUrl('feature'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Feature entity.
     *
     * @Route("/{id}", name="feature_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Phones4MooStoreBundle:Feature')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Feature entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add(
            'notice', "Feature deleted!"
        );

        return $this->redirect($this->generateUrl('feature'));
    }

    /**
     * Creates a form to delete a Feature entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feature_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

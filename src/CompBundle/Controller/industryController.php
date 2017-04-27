<?php

namespace CompBundle\Controller;

use CompBundle\Entity\industry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Industry controller.
 *
 * @Route("industry")
 */
class industryController extends Controller
{
    /**
     * Lists all industry entities.
     *
     * @Route("/", name="industry_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->createQueryBuilder('industry')
	    ->select('industry')
            ->from('CompBundle:industry','industry')
            ->orderBy('industry.parent','DESC')
            ->getQuery();

        $industries = $category->getResult();

        /*$industries = $em->getRepository('CompBundle:industry')->findAll();*/

        return $this->render('CompBundle:industry:index.html.twig', array(
            'industries' => $industries,
        ));
    }

    /**
     * Creates a new industry entity.
     *
     * @Route("/new", name="industry_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $industry = new Industry();

        $form = $this->createForm('CompBundle\Form\industryType', $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*$now = new \DateTime('now');
            $industry->setCreatedAt($now);*/
            $em = $this->getDoctrine()->getManager();
            $em->persist($industry);
            $em->flush($industry);

            return $this->redirectToRoute('industry_show', array('id' => $industry->getId()));
        }

        return $this->render('CompBundle:industry:new.html.twig', array(
            'industry' => $industry,
            'form' => $form->createView(),
        ));


    }

    /**
     * Creates a new industry entity.
     *
     * @Route("/new_industry", name="industry_new_industry")
     * @Method({"GET", "POST"})
     */
    public function new_industryAction(Request $request)
    {
        $industry = new Industry();

        $form = $this->createForm('CompBundle\Form\industry_newType', $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $now = new \DateTime('now');
            $industry->setCreatedAt($now);
            $em = $this->getDoctrine()->getManager();
            $em->persist($industry);
            $em->flush($industry);

            return $this->redirectToRoute('industry_show', array('id' => $industry->getId()));
        }

        return $this->render('CompBundle:industry:new.html.twig', array(
            'industry' => $industry,
            'form' => $form->createView(),
        ));


    }

    /**
     * Finds and displays a industry entity.
     *
     * @Route("/{id}", name="industry_show")
     * @Method("GET")
     */
    public function showAction(industry $industry)
    {
        $deleteForm = $this->createDeleteForm($industry);

        return $this->render('CompBundle:industry:show.html.twig', array(
            'industry' => $industry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing industry entity.
     *
     * @Route("/{id}/edit", name="industry_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, industry $industry)
    {
        $deleteForm = $this->createDeleteForm($industry);
        $editForm = $this->createForm('CompBundle\Form\industryType', $industry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $now = new \DateTime('now');
            $industry->setUpdatedAt($now);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('industry_edit', array('id' => $industry->getId()));
        }

        return $this->render('CompBundle:industry:edit.html.twig', array(
            'industry' => $industry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing industry entity.
     *
     * @Route("/{id}/edit_industry", name="industry_edit_industry")
     * @Method({"GET", "POST"})
     */
    public function edit_industryAction(Request $request, industry $industry)
    {
        $deleteForm = $this->createDeleteForm($industry);
        $editForm = $this->createForm('CompBundle\Form\industry_newType', $industry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $now = new \DateTime('now');
            $industry->setUpdatedAt($now);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('industry_index', array('id' => $industry->getId()));
        }

        return $this->render('CompBundle:industry:edit.html.twig', array(
            'industry' => $industry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a industry entity.
     *
     * @Route("/{id}", name="industry_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, industry $industry)
    {
        $form = $this->createDeleteForm($industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($industry);
            $em->flush();
        }

        return $this->redirectToRoute('industry_index');
    }

    /**
     * Creates a form to delete a industry entity.
     *
     * @param industry $industry The industry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(industry $industry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('industry_delete', array('id' => $industry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

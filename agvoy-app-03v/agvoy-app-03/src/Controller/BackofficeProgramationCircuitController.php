<?php

namespace App\Controller;

use App\Entity\ProgramationCircuit;
use App\Form\ProgramationCircuitType;
use App\Repository\ProgramationCircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/programation/circuit")
 */
class BackofficeProgramationCircuitController extends AbstractController
{
    /**
     * Lists all circuit entities.
     * @Route("/", name = "admin_programation_circuit_index", methods="GET")
     */
    public function index(ProgramationCircuitRepository $programationCircuitRepository): Response
    {
        return $this->render('backoffice_home/programation_circuit/index.html.twig', ['programation_circuits' => $programationCircuitRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_programation_circuit_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $programationCircuit = new ProgramationCircuit();
        $form = $this->createForm(ProgramationCircuitType::class, $programationCircuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programationCircuit);
            $em->flush();
            
            
            // Make sure message will be displayed after redirect
            $this->get('session')->getFlashBag()->add('message', 'un circuit vient d\'être  ajouté');

            return $this->redirectToRoute('admin_programation_circuit_index');
        }

        return $this->render('backoffice_home/programation_circuit/new.html.twig', [
            'programation_circuit' => $programationCircuit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_programation_circuit_show", methods="GET")
     */
    public function show(ProgramationCircuit $programationCircuit): Response
    {
        return $this->render('backoffice_home/programation_circuit/show.html.twig', ['programation_circuit' => $programationCircuit]);
    }

    /**
     * @Route("/{id}/edit", name="admin_programation_circuit_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProgramationCircuit $programationCircuit): Response
    {
        $form = $this->createForm(ProgramationCircuitType::class, $programationCircuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            // Make sure message will be displayed after redirect
            $this->get('session')->getFlashBag()->add('message', 'le circuit vient d \être  modifié');

            return $this->redirectToRoute('admin_programation_circuit_edit', ['id' => $programationCircuit->getId()]);
        }

        return $this->render('backoffice_home/programation_circuit/edit.html.twig', [
            'programation_circuit' => $programationCircuit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_programation_circuit_delete", methods="DELETE")
     */
    public function delete(Request $request, ProgramationCircuit $programationCircuit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$programationCircuit->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($programationCircuit);
            $em->flush();
            
            // Make sure message will be displayed after redirect
            $this->get('session')->getFlashBag()->add('message', 'un circuit vient d \'être supprimé');
        }

        return $this->redirectToRoute('admin_programation_circuit_index');
    }
}

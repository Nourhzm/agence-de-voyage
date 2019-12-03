<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Circuit;
use App\Entity\Etape;
use App\Entity\ProgramationCircuit;

/**
 * Controleur Agence_voyage
 * @Route("/circuit")
 */
class FrontofficeHomeController extends Controller
{
 
   /* public function index()
    {
        return $this->render('frontoffice_home/index.html.twig', [
            'controller_name' => 'FrontofficeHomeController',
        ]);
    }*/
     /**
     * Lists all circuit entities.
     * @Route("/", name = "circuit_home", methods="GET")
     * @Route("/list", name = "circuit_list", methods="GET")
     * @Route("/index", name="circuit_index", methods="GET")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $circuits = $em->getRepository(Circuit::class)->findAll();
        //$circuits = $em->getRepository(Circuit::class)->findById(8);
        
        dump($circuits);
        $likes = $this->get('session')->get('likes');
        
        if ($likes == null)
        {
            $likes=[];
        }
        return $this->render('frontoffice_home/index.html.twig', array(
            'circuits' => $circuits,'likes'=> $likes,
        ));
    }
    
    /**
     * @Route("/likes/{id}", name = "circuit_likes", requirements={ "id": "\d+"}, methods="GET")
     */
    public function likesAction (ProgramationCircuit $circuitprog)
    {
     
        $likes = $this->get('session')->get('likes');
      
        if ($likes == null)
        {
            $likes=[];
        }
    
   
        $id=$circuitprog->getId();
      
        // si l'identifiant n'est pas présent dans le tableau des likes, l'ajouter
        if (! in_array($id, $likes) )
        {
            $likes[] = $id;
           
        }
        else
        // sinon, le retirer du tableau
        {
            $likes = array_diff($likes, array($id));
            
        }
       
        $this->get('session')->set('likes', $likes);
      
        return $this->redirect('/circuit');
    }
    
    /**
     * Finds and displays a circuit entity.
     *
     * @Route("/{id}", name="circuit_show", requirements={ "id": "\d+"}, methods="GET")
     */
    public function showAction(Circuit $circuit): Response
    {
        
        return $this->render('frontoffice_home/show.html.twig', array(
            'circuit' => $circuit,
        ));
    }

}
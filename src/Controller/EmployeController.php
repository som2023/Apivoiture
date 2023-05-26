<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 
 

/**
 * @Route("/api", name="api_")
 */
class EmployeController extends AbstractController
{
     //----lister tous les employe-------
    #[Route('/employe/liste', name: 'liste', methods: ['GET'])]
    public function liste(ManagerRegistry $doctrine): JsonResponse
    {
        $employes = $doctrine
            ->getRepository(Employe::class)
            ->findAll();
  
        $data = [];
  
        foreach ($employes as $employe) {
           $data[] = [
               'id' => $employe->getId(),
               'matricule_employe' => $employe->getMatriculeEmploye(),
               'nom_employe' => $employe->getnomEmploye(),
               'prenom_employe'=>$employe->getPrenomEmploye(),
               'fonction_employe'=>$employe->getFonctionEmploye(),
               'email_employe'=>$employe->getEmailEmploye(),
               'sexe_employe'=>$employe->getSexeEmploye(),
               'datenaissance_employe'=>$employe->getDatenaissanceEmploye(),
               'contact_employe'=>$employe->getContactEmploye()
           ];
        }
  
  
        return $this->json($data);
    }

    //----lister les informations d'un seul employe-------

    #[Route('/employe/lire/{id}', name: 'lire', methods: ['GET'])]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $employe = $doctrine->getRepository(Employe::class)->find($id);
  
        if (!$employe) {
  
            return $this->json('No project found for id' . $id, 404);
        }
  
        $data =  [
               'id' => $employe->getId(),
               'matricule_employe' => $employe->getMatriculeEmploye(),
               'nom_employe' => $employe->getnomEmploye(),
               'prenom_employe'=>$employe->getPrenomEmploye(),
               'fonction_employe'=>$employe->getFonctionEmploye(),
               'email_employe'=>$employe->getEmailEmploye(),
               'sexe_employe'=>$employe->getSexeEmploye(),
               'datenaissance_employe'=>$employe->getDatenaissanceEmploye(),
               'contact_employe'=>$employe->getContactEmploye()
        ];
          
        return $this->json($data);
    }
     
  //Ajouter les données d'un employe

    #[Route('/employe/addEmploye', name: 'addEmploye', methods: ['POST'])] 
    public function addEmploye(ManagerRegistry $doctrine, Request $request):JsonResponse
{       $requestdata= json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();
        $employe = new Employe();
        $employe->setMatriculeEmploye($requestdata['matricule_employe']);
        $employe->setNomEmploye($requestdata['nom_employe']);
        $employe->setPrenomEmploye($requestdata['prenom_employe']);
        $employe->setFonctionEmploye($requestdata['fonction_employe']);
        $employe->setEmailEmploye($requestdata['email_employe']);
        $employe->setSexeEmploye($requestdata['sexe_employe']);
        $employe->setDatenaissanceEmploye(new \DateTime($requestdata['datenaissance_employe']));
        $employe->setContactEmploye($requestdata['contact_employe']); 
        $entityManager->persist($employe);
        $entityManager->flush();
        return $this->json([
            'Enregistré avec succès' => 200,
        ], 200, [], []
    );  
    }

    //Mise à jour des données d'un employe
     #[Route("/employe/edit/{id}", name:"edit", methods:["PUT"])]
    
    public function edit(ManagerRegistry $doctrine, Request $request, int $id): Response
    {   
        $requestdata= json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();
        $employe = $entityManager->getRepository(Employe::class)->find($id);
  
        if (!$employe) {
            return $this->json('No project found for id' . $id, 404);
        }
        $employe->setMatriculeEmploye($requestdata['matricule_employe']);
        $employe->setNomEmploye($requestdata['nom_employe']);
        $employe->setPrenomEmploye($requestdata['prenom_employe']);
        $employe->setFonctionEmploye($requestdata['fonction_employe']);
        $employe->setEmailEmploye($requestdata['email_employe']);
        $employe->setSexeEmploye($requestdata['sexe_employe']);
        $employe->setDatenaissanceEmploye(new \DateTime($requestdata['datenaissance_employe']));
        $employe->setContactEmploye($requestdata['contact_employe']); 
        $entityManager->flush();
  
        $data =  [
            'id' => $employe->getId(),
            'matricule_employe' => $employe->getMatriculeEmploye(),
            'nom_employe' => $employe->getNomEmploye(),
            'prenom_employe' =>$employe->getPrenomEmploye(),
            'fonction_employe' => $employe->getFonctionEmploye(),
            'email_employe' => $employe->getEmailEmploye(),
            'sexe_employe' => $employe->getSexeEmploye(),
            'datenavelope_employe' => $employe->getDatenaissanceEmploye(),
            'contact_employe'=> $employe->getContactEmploye()
        ];
          
        return $this->json([$data,
            'Mise à jour réussie avec succès' => 200]);
        
    }
  //suppression des données d'un employe à partir de son Id
    #[Route("/employe/supprimer/{id}", name:"supprimer", methods:["DELETE"])]
    public function supprimer(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $employe = $entityManager->getRepository(Employe::class)->find($id);
  
        if (!$employe) {
            return $this->json('No project found for id' . $id, 404);
        }
        
        $entityManager->remove($employe);
        $entityManager->flush();
  
        return new JsonResponse('supprimé avec succès', Response::HTTP_OK);
    }
     
}
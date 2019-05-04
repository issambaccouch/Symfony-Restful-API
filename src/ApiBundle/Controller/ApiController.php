<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Competitions;
use ApiBundle\Entity\Compitiondemande;
use ApiBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function getallcompAction()
    {
        $tasks=$this->getDoctrine()->getManager()
            ->getRepository(Competitions::class)
            ->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
    /**
     * @return JsonResponse
     */
    public function getalldcompAction()
    {
        $tasks=$this->getDoctrine()->getManager()
            ->getRepository(Compitiondemande::class)
            ->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
    /**
     * @param $idCmpt
     * @return JsonResponse
     */
    public function getonecompAction($idCmpt){
        $competition = new Competitions();
        $tasks=$this->getDoctrine()->getManager()
            ->getRepository(Competitions::class)
            ->find($idCmpt);
        $competition = $tasks;
        $tasks = $this->incrementeView($competition);
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
    /**
     * @param $id
     * @return JsonResponse
     */
    public function getonedcompAction($id){
        $tasks=$this->getDoctrine()->getManager()
            ->getRepository(Compitiondemande::class)
            ->find($id);
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function newcompAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $task=new Competitions();
        $task->setTitle($request->get('title'));
        $task->setAdresse($request->get('adresse'));
        $task->setDescription($request->get('description'));
        $task->setNbrPart($request->get('nbrPart'));
        $task->setPrize($request->get('prize'));
        $task->setType($request->get('type'));
        $task->setDateCreate($request->get('dateCreate'));
        $task->setDateStart($request->get('dateStart'));
        $task->setDateFin($request->get('dateFin'));
        $task->setVille($request->get('ville'));
        $task->setMedia($request->get('media'));
        $em->persist($task);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($task);
        return new JsonResponse($formatted);
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function newdcompAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $task=new Compitiondemande();
        $task->setIdcompt($request->get('idcompt'));
        $task->setIduser($request->get('iduser'));
        $task->setAdmindecision($request->get('admindecision'));
        $task->setUsercv($request->get('usercv'));
        $task->setUsername($request->get('username'));
        $task->setCompetitiontitre($request->get('competitiontitre'));
        $em->persist($task);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($task);
        return new JsonResponse($formatted);
    }

    /**
     * @param $idCmpt
     * @return JsonResponse
     */
    public function deletecompAction($idCmpt)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Competitions::class)->find($idCmpt);
        $em->remove($cat);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($cat);
        return new JsonResponse($formatted);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function deletedcompAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Compitiondemande::class)->find($id);
        $em->remove($cat);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($cat);
        return new JsonResponse($formatted);
    }

    /**
     * @param Competitions $competitions
     * @return Competitions
     */
    private function incrementeView(Competitions $competitions)
    {
        $competitions->addView();
        $em = $this->getDoctrine()->getManager();;
        $em->persist($competitions);
        $em->flush();

        return $competitions;
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function updatedcompAction(Request $request , $id){
        $em=$this->getDoctrine()->getManager();
        $task = $em->getRepository(Compitiondemande::class)->find($id);
        $task->setIdcompt($request->get('idcompt'));
        $task->setIduser($request->get('iduser'));
        $task->setAdmindecision($request->get('admindecision'));
        $task->setUsercv($request->get('usercv'));
        $task->setUsername($request->get('username'));
        $task->setCompetitiontitre($request->get('competitiontitre'));
        $em->persist($task);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($task);
        return new JsonResponse($formatted);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function updatecompAction(Request $request, $id){
        $em=$this->getDoctrine()->getManager();
        $task = $em->getRepository(Competitions::class)->find($id);
        $task->setTitle($request->get('title'));
        $task->setAdresse($request->get('adresse'));
        $task->setDescription($request->get('description'));
        $task->setNbrPart($request->get('nbrPart'));
        $task->setPrize($request->get('prize'));
        $task->setType($request->get('type'));
        $task->setDateCreate($request->get('dateCreate'));
        $task->setDateStart($request->get('dateStart'));
        $task->setDateFin($request->get('dateFin'));
        $task->setVille($request->get('ville'));
        $task->setMedia($request->get('media'));
        $em->persist($task);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($task);
        return new JsonResponse($formatted);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function finbyuseridAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUsername($request->get('username'));
        $user->setEmail($request->get('email'));
        $user->setPassword($request->get('pass'));
        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function ByUseridAction($id){
        $users=$this->getDoctrine()->getManager()->getRepository(User::class)->find($id);
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($users);
        return new JsonResponse($formatted);
    }
}

<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\AnswerLink;
use App\Entity\User;
use App\Form\AdminUserEditType;
use App\Form\AdminUserNewType;
use App\Repository\AnswerLinkRepository;
use App\Repository\AnswerRepository;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin/chatbot")
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class AdminAnswerController extends AbstractController
{
    /**
     * @Route("/", name="chatbot_view", methods={"GET"})
     */
    public function index(AnswerRepository $answerRepository): Response
    {
        $firstAnswers = $answerRepository->findBy(['first' => true]);
        $array = [];
        foreach ($firstAnswers as $firstAnswer) {
            $array[] = [
                'id' => $firstAnswer->getId(),
                'text' => $firstAnswer->getText()
            ];
            $array = $this->recursiveSerialize($firstAnswer, $array);
        }
        return $this->render('admin/answer/index.html.twig', [
            'array' => json_encode($array)
        ]);
    }

    protected function recursiveSerialize(Answer $answer, $array = null)
    {
        foreach ($answer->getTargetAnswer() as $targetAnswer) {
            foreach ($array as $index => $item) {
                if ($item['id'] === $targetAnswer->getSourceAnswer()->getId()) {
                    $array[$index]['children'][] = [
                        'id' => $targetAnswer->getTargetAnswer()->getId(),
                        'text' => $targetAnswer->getTargetAnswer()->getText()
                    ];
                    if (!$targetAnswer->getTargetAnswer()->getTargetAnswer()->isEmpty()) {
                        $array[$index]['children'] = $this->recursiveSerialize($targetAnswer->getTargetAnswer(), $array[$index]['children']);
                    }

                }
            }
        }
        return $array;
    }

    protected function recursiveUnserialize(Answer $answer, $data, $arrayAnswers = null)
    {
        if (isset($data['children']) && !empty($data['children'])) {
            foreach ($data['children'] as $child) {

                $childAnswer = (new Answer())
                    ->setText($child['text'])
                    ->setFirst(false)
                    ->setCreatedAt(new \DateTime());

                $answerLink = (new AnswerLink())
                    ->setSourceAnswer($answer)
                    ->setTargetAnswer($childAnswer);

                $answer->addAnswerLinks($answerLink);
                $this->recursiveUnserialize($childAnswer, $child);
            }
        }
        return $answer;
    }


    /**
     * @Route("/update", name="chatbot_update")
     */
    public function changeState(Request $request, AnswerRepository $answerRepository, LoggerInterface $logger)
    {
        if ($request->isXmlHttpRequest()) {
            if (!empty($datas = ($request->request->get('data')))) {
                $this->cleanAnswer($answerRepository);
                foreach ($datas as $data) {
                    $answer = (new Answer())
                        ->setCreatedAt(new \DateTime())
                        ->setFirst(true)
                        ->setText($data['text']);
                    $answer = $this->recursiveUnserialize($answer, $data);
                    $this->getDoctrine()->getManager()->persist($answer);
                    $this->getDoctrine()->getManager()->flush();
                }
                return $this->json(['type' => 'success', 'message' => 'Réponses mises à jour']);
            }
        }
        return $this->json(['type' => 'error', 'message' => 'Erreur'], 400);
    }

    protected function cleanAnswer(AnswerRepository $answerRepository)
    {
        foreach ($answerRepository->findAll() as $answer) {
            $this->getDoctrine()->getManager()->remove($answer);
        }
        $this->getDoctrine()->getManager()->flush();
    }
}

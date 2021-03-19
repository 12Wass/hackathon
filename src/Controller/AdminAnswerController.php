<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Service\ChatbotService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/chatbot")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminAnswerController extends AbstractController
{
    /**
     * @Route("/", name="chatbot_view", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('admin/answer/index.html.twig');
    }

    /**
     * @Route("/update", name="chatbot_list_answer", methods={"GET"})
     */
    public function getChatbotAnswer(Request $request, AnswerRepository $answerRepository, ChatbotService $chatbotService)
    {
        if ($request->isXmlHttpRequest()) {
            $firstAnswers = $answerRepository->findBy(['first' => true]);
            $array = [];
            foreach ($firstAnswers as $firstAnswer) {
                $array[] = [
                    'id' => $firstAnswer->getId(),
                    'text' => $firstAnswer->getText()
                ];
                $array = $chatbotService->recursiveSerialize($firstAnswer, $array);
            }
            return $this->json(['type' => 'success', 'datas' => $array]);
        }
        return $this->json(['type' => 'error', 'message' => 'Erreur'], 400);
    }

    /**
     * @Route("/update", name="chatbot_update", methods={"POST"})
     */
    public function updateChatbotAnswer(Request $request, AnswerRepository $answerRepository, ChatbotService $chatbotService)
    {
        if ($request->isXmlHttpRequest()) {
            if (!empty($datas = ($request->request->get('data')))) {
                $chatbotService->cleanAnswer($answerRepository);
                foreach ($datas as $data) {
                    $answer = (new Answer())
                        ->setCreatedAt(new \DateTime())
                        ->setFirst(true)
                        ->setText($data['text']);
                    $answer = $chatbotService->recursiveUnserialize($answer, $data);
                    $this->getDoctrine()->getManager()->persist($answer);
                    $this->getDoctrine()->getManager()->flush();
                }
                return $this->json(['type' => 'success', 'message' => 'Réponses mises à jour']);
            }
        }
        return $this->json(['type' => 'error', 'message' => 'Erreur'], 400);
    }
}

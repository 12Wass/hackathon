<?php


namespace App\Controller;

use App\Entity\Answer;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AnswerRepository;
use App\Service\ChatbotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/trouver-mon-dispositif", name="chatbot")
     */
    public function home(): Response
    {
        return $this->render('public/chatbot/index.html.twig');
    }


    /**
     * @Route("/chatbot/list", name="chatbot_get_first_answer")
     */
    public function getFirstAnswer(Request $request, AnswerRepository $answerRepository): Response
    {
        if ($request->isXmlHttpRequest()) {
            $firstAnswers = $answerRepository->findBy(['first' => true]);
            $array = [];
            foreach ($firstAnswers as $key => $firstAnswer) {
                $array[] = [
                    'text' => $firstAnswer->getText()
                ];
                if (!$firstAnswer->getTargetAnswer()->isEmpty()) {
                    foreach ($firstAnswer->getTargetAnswer() as $answerLink) {
                        $array[$key]['answers'][] = [
                            'id' => $answerLink->getTargetAnswer()->getId(),
                            'text' => $answerLink->getTargetAnswer()->getText()
                        ];
                    }
                }
            }
            return $this->json(['type' => 'success', 'data' => $array]);
        }
        return $this->json(['type' => 'error', 'message' => 'Une erreur est survenue'], 400);
    }

    /**
     * @Route("/chatbot/{id}", name="chatbot_get_answer")
     */
    public function getAnswer(Request $request, Answer $answer): Response
    {
        if ($request->isXmlHttpRequest()) {
            $array = [];
            foreach ($answer->getTargetAnswer() as $key => $nextAnswer) {
                $chatAnswer = $nextAnswer->getTargetAnswer();
                $array[] = [
                    'text' => $chatAnswer->getText()
                ];
                if (!$chatAnswer->getTargetAnswer()->isEmpty()) {
                    foreach ($chatAnswer->getTargetAnswer() as $answerLink) {
                        $array[$key]['answers'][] = [
                            'id' => $answerLink->getTargetAnswer()->getId(),
                            'text' => $answerLink->getTargetAnswer()->getText()
                        ];
                    }
                }
            }
            return $this->json(['type' => 'success', 'data' => $array]);
        }

        return $this->json(['type' => 'error', 'message' => 'Une erreur est survenue'], 400);
    }

}

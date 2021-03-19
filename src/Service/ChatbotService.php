<?php


namespace App\Service;

use App\Entity\Answer;
use App\Entity\AnswerLink;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;

class ChatbotService
{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function recursiveSerialize(Answer $answer, $array = null)
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

    public function recursiveUnserialize(Answer $answer, $data)
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

    public function cleanAnswer(AnswerRepository $answerRepository)
    {
        foreach ($answerRepository->findAll() as $answer) {
            $this->em->remove($answer);
        }
        $this->em->flush();
    }
}

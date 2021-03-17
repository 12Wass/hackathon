<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AdminUserEditType;
use App\Form\AdminUserNewType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin/utilisateurs")
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class AdminUserController extends AbstractController
{
    /**
     * @Route("/", name="user_list", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $userRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(AdminUserNewType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($user->getPlainPassword())) {
                $user->setPassword($passwordEncoder->encodePassword($user, $user->getPlainPassword()));
                $user->setCreatedAt(new \DateTime());
                $this->getDoctrine()->getManager()->persist($user);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Utilisateur créer');
                return $this->redirectToRoute('user_list');
            }
            $this->addFlash('error', 'Veuillez saisir un mot de passe');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }



    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(AdminUserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($user->getPlainPassword())) {
                $user->setPassword($passwordEncoder->encodePassword($user, $user->getPlainPassword()));
            }
            $user->setUpdatedAt(new \DateTime());
            if ($user->getActive() === false){
                $user->setDeleteAt(new \DateTime());
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Utilisateur modifié');
            return $this->redirectToRoute('user_list');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="user_delete", methods={"GET"})
     */
    public function delete(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('success', 'Utilisateur supprimé');
        return $this->redirectToRoute('user_list');
    }
}

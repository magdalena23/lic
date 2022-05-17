<?php
/**
 * Comment controller
 */


namespace App\Controller;
use App\Entity\Comment;
use App\Form\CommentFormType;
use App\Repository\CommentRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;

/**
 * Class CommentController.
 *
 * @Route("/comment")
 */
class CommentController extends AbstractController
{
    private $twig;
    private $entityManager;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    /**
     * Index action.
     *
     * @param Request $request
     * @param CommentRepository $commentRepository
     * @return Response HTTP response
     * @Route(
     *     "/",
     *     methods={"GET", "POST"},
     *     name="comment_index",
     * )
     */
    public function index(Request $request, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    //$comment->setComment($comment);

                    $this->entityManager->persist($comment);
                    $this->entityManager->flush();


                    return $this->redirectToRoute('comment_index');
        }

        return new Response($this->twig->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
            'comment_form' => $form->createView(),
        ]));
    }

}
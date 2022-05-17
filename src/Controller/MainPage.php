<?php
/**
 * Main page controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MainPage.
 */
class MainPage extends AbstractController
{
    /**
     * Index action.
     *
     * @param Request $request
     * @return Response HTTP response
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="main_index",
     * )
     */
    public function index(Request $request): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * Index action.
     *
     * @param Request $request
     * @return Response HTTP response
     * @Route(
     *     "/outfit",
     *     methods={"GET"},
     *     name="main_outfit",
     * )
     */
    public function outfit(Request $request): Response
    {
        return $this->render('main/outfit.html.twig');
    }

    /**
     * Index action.
     *
     * @param Request $request
     * @return Response HTTP response
     * @Route(
     *     "/about",
     *     methods={"GET"},
     *     name="main_about",
     * )
     */
    public function about(Request $request): Response
    {
        return $this->render('main/about.html.twig');
    }

    /**Index action.
     * @param Request $request
     * @return Response HTTP response
     * @Route(
     *     "/comment",
     *     methods={"GET"},
     *     name="comment_index",
     * )
     */
    public function comment(Request $request): Response
    {
        return $this->render('comment/index.html.twig');
    }
}
<?php
namespace App\Controller;
use App\Entity\Lesarticles;
use App\Form\ArticlesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/articles")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles_index", methods="GET")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Lesarticles::class)
            ->findAll();
        return $this->render('articles/index.html.twig', ['articles' => $articles]);
    }
    /**
     * @Route("/new", name="articles_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $article = new Lesarticles();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('articles_index');
        }
        return $this->render('articles/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{idarticles}", name="articles_show", methods="GET")
     */
    public function show(): Response
    {
        $article = $this->getDoctrine()
            ->getRepository(Lesarticles::class)
            ->findall();

        return $this->render('articles/show.html.twig', ['article' => $article]);
    }
    /**
     * @Route("/{idarticles}/edit", name="articles_edit", methods="GET|POST")
     */
    public function edit(Request $request, Lesarticles $article): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('articles_edit', ['idarticles' => $article->getIdlesarticles()]);
        }
        return $this->render('articles/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{idarticles}", name="articles_delete", methods="DELETE")
     */
    public function delete(Request $request, Lesarticles $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getIdlesarticles(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }
        return $this->redirectToRoute('articles_index');
    }
}

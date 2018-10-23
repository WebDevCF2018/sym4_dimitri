<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Thesections;
use App\Entity\Lesarticles;


class PubliController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {

        $entitymanager = $this->getDoctrine()->getManager();

        $lessection = $entitymanager->getRepository(Thesections::class)->findAll();

        $lesarticle = $entitymanager->getRepository(Lesarticles::class)->findBy([],["idlesarticles"=>"DESC"]);




        return $this->render('publi/index.html.twig', [

            'sections' => $lessection,
            'articles' => $lesarticle,
        ]);
    }
    /**
     * @Route("/article/{id}", name="detail_article", requirements={"id"="\d+"})
     *
     */
    public function oneArticle($id){

        $entityManager = $this->getDoctrine()->getManager();

        $section = $entityManager->getRepository(Thesections::class)->findAll();

        $article = $entityManager->getRepository(Lesarticles::class)->find($id);

        return $this->render('publi/un_article.html.twig',[
         'sections' => $section,
         'articles' => $article ,
        ] );
    }

    /**
     * @Route("/section/{id}", name="detail_section", requirements={"id"="\d+"})
     *
     */
    public function oneSection($id){

        $entityManager = $this->getDoctrine()->getManager();

        $sections = $entityManager->getRepository(Thesections::class)->findAll();

        $section = $entityManager->getRepository(Thesections::class)->find($id);

        $article = $section->getLesarticleslesarticles();

        return $this->render('publi/un_article.html.twig',[
            'sections' => $sections,
            'articles' => $article ,
            'section' => $section,
        ] );
    }
}

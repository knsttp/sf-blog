<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController {
    
    public function create(Request $request) {
        
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $article = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect('/article/' . $article->getId());
        }

        return $this->render('article/edit.html.twig', ['form' => $form->createView()]);
    }

    public function view($id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
        if(!$article){
            throw $this->createNotFoundException("There are no articles with the id: $id");
        }
        
        return $this->render('article/view.html.twig', ['article' => $article]);        
    }

    public function show() {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('article/show.html.twig', ['articles' => $articles]);        
    }

    public function delete($id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
        if(!$article){
            throw $this->createNotFoundException("There are no articles with the id: $id");
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
        
        return $this->redirect('/articles');
    }

    public function update(Request $request, $id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
        if(!$article){
            throw $this->createNotFoundException("There are no articles with the id: $id");
        }        
        
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $article = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirect('/article/' . $article->getId());
        }

        return $this->render('article/edit.html.twig', ['form' => $form->createView()]);
    }
    
}

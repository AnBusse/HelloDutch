<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Form\SearchFormType;
use App\Entity\Province;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use StepanDalecky\KmlParser\Parser;


class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function indexAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $provinces = $this->getDoctrine()
            ->getRepository(Province::class)
            ->findAll();

        $form = $this->createForm(SearchFormType::class);
        $formview = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $qb = $em->createQueryBuilder();
            $qb->select('recipe.title')
                ->from('Recipes', 'u')
                ->where('recipes.description =in (:description)')
                ->andWhere("category.id in (:categories)")
                ->andWhere("provinces.id in (:provinces)")
                ->orderBy('provinces.id', 'ASC')
                ->setParameter("categories", $formData['data']['description'])
                ->setParameter("categories", $formData['data']['category'])
                ->setParameter("provinces",  $formData['data']['provinces']);
            ;

            $query = $qb->getQuery();
            $result = $query->getResult();

            return $this->render('list.html.twig', array(
                'resultset' => $result,
            ));
        }

        return $this->render('homepage.html.twig', array('form' => $formview)
        );
    }
}
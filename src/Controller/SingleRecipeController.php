<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 6-7-18
 * Time: 1:06
 */

namespace App\Controller;


use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recipe/{id}", name="singleRecipe")
 */
class SingleRecipeController extends AbstractController
{

    public function displayRecipe($id) {

        $em = $this->getDoctrine()->getManager();

        $recipe = $this->getDoctrine()
            ->getRepository(Recipe::class)
            ->find($id);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe found for id '.$id
            );
        }

        return $this->render('::single.html.twig', array('result' => $recipe));

    }
}
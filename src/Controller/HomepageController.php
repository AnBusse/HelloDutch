<?php

namespace App\Controller;

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

     //   $form = $this->createForm(ConverterFormType::class);

        $parser = Parser::fromFile('geodata/provinces.kml');
        $kml = $parser->getKml();

       // $form->handleRequest($request);
        /*
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $currencyValuesObj = new CurrencyController();
            $returnValue = $currencyValuesObj->convertAction($FromCurrency, $ToCurrency,$userInputValue);

            return $this->render('homepage.html.twig', array(
                'calcValue' => $returnValue['result'],
                'userInputValue' => $userInputValue,
                'currencyFrom' => $FromCurrency,
                'currencyTo' => $ToCurrency
            ));
        }
        */
    //    $response = new Response($this->render('sitemap.xml.twig'));
   //     $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
   //     return $response;
        return $this->render('homepage.html.twig', array('kmldata' => $kml)
        );
    }
}
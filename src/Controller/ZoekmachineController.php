<?php

namespace App\Controller;

use App\Entity\Offices;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ZoekmachineController extends AbstractController {
    private function sortOffices($searchedCity){

// ####### DATABANK OPHALEN #######

        $repository = $this->getDoctrine()->getRepository(Offices::class);
        $offices = $repository->findAll();


// ####### STEDEN #######

        switch($searchedCity) {
            case "Gent":
                $inputLat = 51.054633;
                $inputLong = 3.7197544;
                break;
            case "Brugge":
                $inputLat = 51.2093205;
                $inputLong = 3.2220239;
                break;
            case "Antwerpen":
                $inputLat = 51.2171919;
                $inputLong = 4.4192574;
                break;
            case "Brussel":
                $inputLat = 50.858638;
                $inputLong = 4.353416;
                break;
            case "Kortrijk":
                $inputLat = 50.808208;
                $inputLong = 3.266394;
                break;
            case "Hasselt":
                $inputLat = 50.937960;
                $inputLong = 5.306940;
                break;
        }

// ####### RADIUS BEREKENEN #######

//      $get_data = file_get_contents('http://api.geoname.org/search?q=gent&country=belgium');
//      $response = json_decode($get_data, true);
//      var_dump($response);
        $radiusArray = array();
        foreach($offices as $office) {
            $radius = pow((pow(($office->getLongitude()-$inputLong),2) + pow(($office->getLatitude()-$inputLat),2)), 0.5);
            $radiusArray[$office->getId()] = $radius;
        };
        asort($radiusArray);
        $sortedOffices = array_slice($radiusArray, 0, 5, true);
        $sortedAdresses = array();
        foreach($sortedOffices as $key => $value){
            foreach($offices as $office) {
                if ($office->getId() == $key) {
                    $officeString= "'".$office->getStreet().",".$office->getCity()."'";
                    array_push($sortedAdresses, $officeString);
                    break;
                };
            };
        };
        return $sortedAdresses;
    }

// ####### SHOW SEARCHBAR #######

    /**
     * @Route("/zoekmachine", methods={"POST, GET"})
     * @param $request
     * @return Response
     */
    public function show(Request $request){
        if ($request->isXmlHttpRequest()) {
            $test1 = $request->request->get('searchOffice');
            $test2 = json_encode($this->sortOffices($test1));
            return new JsonResponse($test2);
        } else {
            return $this->render('zoekmachine/show.html.twig', [
                'title' => 'Offices search',
            ]);
        }
    }
}
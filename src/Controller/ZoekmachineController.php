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

// ####### DATABANK #######

//      locale databank ophalen
        $repository = $this->getDoctrine()->getRepository(Offices::class);
        $offices = $repository->findAll();


// ####### STEDEN #######

//      ## onderzoek steden API
//      $get_data = file_get_contents('http://api.geoname.org/search?q=gent&country=belgium');
//      $response = json_decode($get_data, true);
//      var_dump($response);

//      Alle mogelijke opties van inputvalues
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
            case "Kontich":
                $inputLat = 51.124296;
                $inputLong = 4.449704;
                break;
            case "Leuven":
                $inputLat = 50.877699;
                $inputLong = 4.703712;
                break;
            case "Luik":
                $inputLat = 50.630499;
                $inputLong = 5.586385;
                break;
            case "Bergen":
                $inputLat = 50.460742;
                $inputLong = 3.968991;
                break;
            case "Aarlen":
                $inputLat = 49.677788;
                $inputLong = 5.812560;
                break;
            case "Namen":
                $inputLat = 50.476488;
                $inputLong = 4.871265;
                break;
            case "Waver":
                $inputLat = 50.715241;
                $inputLong = 4.599856;
                break;
        }

// ####### RADIUS BEREKENEN #######

        $radiusArray = array();
        foreach($offices as $office) {
//          radius berekenen
            $radius = pow((pow(($office->getLongitude()-$inputLong),2) + pow(($office->getLatitude()-$inputLat),2)), 0.5);
            $radiusArray[$office->getId()] = $radius;
        };
        asort($radiusArray);
//      aantal offices tonen
        $sortedRadiusAray = array_slice($radiusArray, 0, 7, true);
        $sortedOffices = array();
        foreach($sortedRadiusAray as $key => $value){
            foreach($offices as $office) {
//              straat en stad ophalen van offices met zelfde id als longitude en latitude
                if ($office->getId() == $key) {
                    $officeString= "'".$office->getStreet().",".$office->getCity()."'";
                    array_push($sortedOffices, $officeString);
                    break;
                };
            };
        };
        return $sortedOffices;
    }

// ####### SHOW SEARCHBAR #######

    /**
     * @Route("/zoekmachine", methods={"POST, GET"})
     * @param $request
     * @return Response
     */
    public function show(Request $request){
        if ($request->isXmlHttpRequest()) {
//          Inputfield value
            $inputfieldValue = $request->request->get('searchOffice');
            $officeSorting = json_encode($this->sortOffices($inputfieldValue));
            return new JsonResponse($officeSorting);
        } else {
            return $this->render('zoekmachine/show.html.twig', [
                'title' => 'Offices search',
            ]);
        }
    }
}
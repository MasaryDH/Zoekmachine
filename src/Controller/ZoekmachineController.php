<?php

namespace App\Controller;

use App\Entity\Offices;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ZoekmachineController extends AbstractController {
    /**
     * @Route("/")
     */
    public function homepage(){
        $number = random_int(0, 100);
        return new Response('
        <html>
            <body>
                <div>
                    <p>Show offices in the neighborhood of:</p>
                    <input name="testInputField"><br>
                    <input type="checkbox" name="checkbox1">
                    <input type="checkbox" name="checkbox2"><br>
                    <textarea></textarea>
                    Lucky number: '.$number.'
                </div>
            </body>
        </html>');
    }

    /**
     * @Route("/zoekmachine/{slug}")
     */
    public function show($slug){
        $repository = $this->getDoctrine()->getRepository(Offices::class);

        $offices = $repository->findAll();
        
//        // Specific search trough database
//        $offices = $repository->findBy([
//            'city' => 'GENT',
//        ]);

        return $this->render('zoekmachine/show.html.twig', [
            'title' => ucwords(str_replace('-','',$slug)),
            'offices' => $offices,
        ]);
    }
}
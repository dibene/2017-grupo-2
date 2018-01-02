<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Estudio controller.
 *
 * @Route("pdf")
 */


class DefaultController extends Controller
{

     /**
     * PDF.
     *
     *  @Route("/", name="pdf")
     * 
     */

    public function indexAction()
    {
        $snappy = $this->get('knp_snappy.pdf');
        
        $html = '<h1>Hello</h1>';
        
        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
}

?>
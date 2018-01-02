<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Demo controller.
 *
 * @Route("pdf")
 */


class SandBoxController extends Controller
{

     /**
     * PDF.
     *
     *  @Route("/", name="pdf")
     *  @Method("GET")
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
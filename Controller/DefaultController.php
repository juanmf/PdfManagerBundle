<?php

namespace DocDigital\Bundle\PdfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/pdfoperations")
 * 
 * @author Juan Manuel Fernandez <juanmf@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/try" , name="pdfoperations_test")
     * @ Template()
     */
    public function indexAction()
    {
        /* @var $pdfManager \DocDigital\Lib\PdfManager\Fpdi\FpdiPdfManager */
        $pdfManager = $this->get('dd_pdf.pdf_manager');
        $pdf = $pdfManager->insert(
                '/home/juanmf/Work/GDocs/docdigital1/media/Test1/2014-06/2014-06-09-14-48-59-000000.pdf', '/home/juanmf/Documents/proveedorEstado.pdf', 1
            );
        
        $response =  new \Symfony\Component\HttpFoundation\Response($pdf->render());
        $response->headers->set('Content-Type', 'application/pdf');
        return $response;
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CreateLinodeType;
use AppBundle\Enum\PaymentTermEnum;
use AppBundle\Form\CloneType;
use AppBundle\Model\Linode;

class LinodeController extends Controller
{
    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(CreateLinodeType::class, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->get('linode.api.host')->createLinode(
                $data['dataCenter'],
                $data['plan'],
                $data['paymentTerm']
            );
        }

        return $this->render('AppBundle:Linode:linode.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/clone", name="clone")
     */
    public function cloneAction(Request $request)
    {
        $form = $this->createForm(CloneType::class, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $response = $this->get('linode.api.host')->cloneLinode(
                $data['clone'],
                $data['dataCenter'],
                $data['plan'],
                $data['paymentTerm']
            );

            $linode = $data['linode'];
            $linode->setId($response['LinodeID']);
            $this->get("linode.api.host")->updateLinode($linode);

            $linode = $this->get("linode.api.host")
                ->getLinodes($linode->getId())
                ->first();

            $ip = $this->get('linode.api.ip')->getIpAddresses($linode->getId());
        }

        return $this->render('AppBundle:Linode:linode.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="dashboard")
     */
    public function listAction()
    {
        $linodes = $this->get('linode.api.host')->getLinodes();

        return $this->render('AppBundle:Linode:dashboard.html.twig', [
            'linodes' => $linodes,
        ]);
    }
}

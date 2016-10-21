<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CreateLinodeType;
use AppBundle\Enum\PaymentTermEnum;
use AppBundle\Form\CloneType;
use AppBundle\Model\Linode;
use AppBundle\Form\ProvisionType;
use AppBundle\Enum\LinodeStatusEnum;
use AppBundle\Model\MigrateConfig;
use AppBundle\Form\MigrateType;
use AppBundle\Service\ProvisionService;

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

            // Update the linode label.
            $linode = $data['linode'];
            $linode->setId($response['LinodeID']);
            $this->get("linode.api.host")->updateLinode($linode);
            $job = $this->get("linode.api.host")->bootLinode($linode)['JobID'];

            // Forward to the provisioning page.
            return $this->redirectToRoute('provision', array(
                'linode' => $linode->getId(),
                'jobId' => $job
            ));
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

    /**
     * @Route("/migrate/{linode}", name="provision")
     */
    public function migrateAction(Request $request, Linode $linode)
    {
        $ip = $this->get('linode.api.ip')->getIpAddresses($linode->getId())->first();
        $hostname = $linode->getLabel();
        $status = new LinodeStatusEnum($linode->getStatus());

        $config = (new MigrateConfig())
            ->setIpv4($ip->getIpAddress())
            ->setHostname($hostname);

        $form = $this->createForm(MigrateType::class, $config);
        $form->handleRequest($request);

        if ($submitted = $form->isSubmitted()
            && $form->isValid()
            && $status == LinodeStatusEnum::RUNNING()
        ) {
            $data = $form->getData();

            $provisionService = new ProvisionService(
                $this->get('ssh.connection.factory')->createSession($data->getIpv4()),
                $data
            );

            // These could be fields in the form, but setting them
            // as configuration variables is easier until multiple
            // scripts need to be selected for deployment.
            $provisionService
                ->pushScript(
                    $this->getParameter('script.path'),
                    $this->getParameter('script.dest')
                )
                ->executeScript(
                    $this->getParameter('script.dest')
                );

            return $this->redirectToRoute('success', array(
                'linode' => $linode->getId()
            ));
        }

        return $this->render('AppBundle:Linode:provision.html.twig', [
            'status' => $status,
            'form' => $form->createView(),
            'is_submitted' => $submitted,
            'job' => $request->query->get('jobId')
        ]);
    }

    /**
     * @Route("/success/{linode}", name="success")
     */
    public function successRoute(Request $request, Linode $linode)
    {
        return $this->render('AppBundle:Linode:success.html.twig', [
            'linode' => $linode
        ]);
    }
}

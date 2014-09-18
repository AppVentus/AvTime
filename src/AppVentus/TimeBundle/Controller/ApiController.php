<?php

namespace AppVentus\TimeBundle\Controller;

use AppVentus\TimeBundle\Entity\Entry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/v1/actions")
     * @Template()
     */
    public function writeAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $entry = new Entry();

        foreach ($data as $key => $value) {
            if (method_exists($entry, "set" . ucfirst($key))) {
                $entry->{"set" . ucfirst($key)}($value);
                unset($data[$key]);
            }
        }

        if (array_key_exists('lines', $data)) {
            $entry->setLine($data['lines']);
            unset($data['lines']);
        }
        if (array_key_exists('is_write', $data)) {
            $entry->setIsWrite($data['is_write']);
            unset($data['is_write']);
        }

        if (!empty($data)) {
            error_log("WAKATIME: unknown data: " . print_r($data, true));
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($entry);
        $em->flush();

        // error_log(print_r($request->getUri(), true));
        // error_log(print_r($request->getMethod(), true));
        return new Response('', 201);
    }

    /**
     * @Route("/v1/read")
     * @Template()
     */
    public function readAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $em = $this->getDoctrine()->getManager();
        $entryRepo = $em->getRepository('AvTimeBundle:Entry');

        $commit = $entryRepo->getLastCommitForBranchAndProject($data['branch'], $data['project'])->getQuery()->getOneOrNullResult();

        if (!$commit) {
            $commit = new Entry();
            $commit->setBranch($data['branch']);
            $commit->setProject($data['project']);
            $commit->setTime(0);
        }
        $entries = (array) $entryRepo->getEntriesSinceCommit($commit)->getQuery()->getResult();

        $totalTime = 0;
        foreach ($entries as $key => $entry) {
            if (array_key_exists($key+1, $entries)) {
                if ($entry->getTime() - $entries[$key+1]->getTime() <= 15 * 60) {
                    $totalTime += $entry->getTime() - $entries[$key+1]->getTime();
                }
            }
        }

        // time worked on this commit
        if ($totalTime > 0) {
            return new JsonResponse(array('response' => "#time " . round($totalTime / 60) . "m"));
        }

        return new JsonResponse(array('response' => ""));
    }
}

<?php
namespace AppVentus\TimeBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EntryRepository extends EntityRepository
{
    public function getLastCommitForBranchAndProjectAndUser($branch, $project, $user)
    {
        $qb = $this->createQueryBuilder('entry')
             ->where('entry.type = :type')
             ->andWhere('entry.branch = :branch')
             ->andWhere('entry.project = :project')
             ->andWhere('entry.user = :user')
             ->orderBy('entry.time', 'DESC')
             ->setMaxResults(1);
        $qb->setParameter('type', 'commit');
        $qb->setParameter('branch', $branch);
        $qb->setParameter('project', $project);
        $qb->setParameter('user', $user);

        return $qb;
    }

    public function getEntriesSinceCommitForUser($commit, $user)
    {
        $qb = $this->createQueryBuilder('entry')
             ->where('entry.type = :type')
             ->andWhere('entry.branch = :branch')
             ->andWhere('entry.project = :project')
             ->andWhere('entry.time > :time')
             ->andWhere('entry.user > :user')
             ->orderBy('entry.time', 'DESC');
        $qb->setParameter('type', 'entry');
        $qb->setParameter('user', $user);
        $qb->setParameter('branch', $commit->getBranch());
        $qb->setParameter('project', $commit->getProject());
        $qb->setParameter('time', $commit->getTime());
        $qb->orderBy('entry.time', 'DESC');

        return $qb;

    }
}

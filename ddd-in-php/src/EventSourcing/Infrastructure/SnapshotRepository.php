<?php

declare(strict_types=1);

namespace App\EventSourcing;

class SnapshotRepository
{
    /**
     * @var object
     */
    private $serializer;

    /**
     * @var object
     */
    private $redis;

    public function __construct($serializer)
    {
        $this->serializer = $serializer;
    }

    public function byId($id)
    {
        $key = 'snapshots:' . $id;
        $metadata = $this->serializer->unserialize(
            $this->redis->get($key)
        );

        if ($metadata === null) {
            return null;
        }

        return new Snapshot(
            $metadata['version'],
            $this->serializer->unserialize(
                $metadata['snapshot']['data'],
                $metadata['snapshot']['type'],
            )
        );
    }

    public function save($id, Snapshot $snapshot)
    {
        $key = 'snapshots:' . $id;
        $aggregate = $snapshot->aggregate();

        $snapshot = [
            'version' => $snapshot->getVersion(),
            'snapshot' => [
                'type' => get_class($aggregate),
                'data' => $this->serializer->serialize($aggregate)
            ]
        ];

        $this->redis->set($key, $snapshot);
    }

    public function has(int $id, $version): bool
    {
        $snapshot = $this->byId($id);
        if ($snapshot === null) {
            return false;
        }

        return $snapshot->getVersion() === $version;
    }
}
<?php

use App\CQRS\Command\CommentCommand;
use App\CQRS\Command\PostCommand;
use App\CQRS\Domain\Post;
use App\CQRS\Infrastructure\Persistence\CommentPsqlRepository;
use App\CQRS\Infrastructure\Persistence\EventStore;
use App\CQRS\Infrastructure\Persistence\PostPsqlRepository;
use App\CQRS\Infrastructure\Persistence\PsqlViewRepository;
use App\CQRS\Infrastructure\Projection\CommentTextWasChangedProjection;
use App\CQRS\Infrastructure\Projection\CommentWasCreatedProjection;
use App\CQRS\Infrastructure\Projection\PostContentWasChangedProjection;
use App\CQRS\Infrastructure\Projection\PostTitleWasChangedProjection;
use App\CQRS\Infrastructure\Projection\PostWasCreatedProjection;
use App\CQRS\Infrastructure\Projection\Projector;
use App\CQRS\Query\PostQuery;
use JMS\Serializer\SerializerBuilder;

require_once '../vendor/autoload.php';

define('ROOT', dirname(__DIR__));

$pdo = new \Aura\Sql\ExtendedPdo('pgsql:host=localhost;port=6432;dbname=cqrs');
$pdo->connect();

// init projections
$projector = new Projector();
$projector->register([
    new PostWasCreatedProjection($pdo),
    new PostContentWasChangedProjection($pdo),
    new PostTitleWasChangedProjection($pdo),
    new CommentWasCreatedProjection($pdo),
    new CommentTextWasChangedProjection($pdo)
]);

// init serializer
$serializer = SerializerBuilder::create()
    ->addMetadataDir(ROOT . '/src/CQRS/Infrastructure/Serialization/JMS/Config')
    ->setCacheDir(ROOT . '/var/cache/JSM')
    ->build();


// init eventstore
$eventStore = new EventStore($pdo, $serializer);

// init repos
$postRepository = new PostPsqlRepository($eventStore, $projector);
$commentRepository = new CommentPsqlRepository($eventStore, $projector);

// init view repos
$viewRepository = new PsqlViewRepository($pdo);

// register commands
//$command = new PostCommand($postRepository);
//$command->createPost();
//$command->updatePost(10);

$comment = new CommentCommand($postRepository, $commentRepository);
$comment->updateComment(14);

//$query = new PostQuery($viewRepository);
//$query->getPostById(10);
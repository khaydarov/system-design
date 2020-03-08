<?php
declare(strict_types=1);

use App\Behavioral\ChainOfResponsibilities\Example1\FastStorage;
use App\Behavioral\ChainOfResponsibilities\Example1\Handler;
use App\Behavioral\ChainOfResponsibilities\Example1\RequestInterface;
use App\Behavioral\ChainOfResponsibilities\Example1\SlowStorage;
use App\Behavioral\ChainOfResponsibilities\Example2\RoleCheckMiddleware;
use App\Behavioral\ChainOfResponsibilities\Example2\Server;
use App\Behavioral\ChainOfResponsibilities\Example2\ThrottlingMiddleware;
use App\Behavioral\ChainOfResponsibilities\Example2\UserExistsMiddleware;
use PHPUnit\Framework\TestCase;

class ChainTest extends TestCase
{
    /**
     * @var Handler
     */
    private $chain;

    protected function setUp(): void
    {
        $this->chain = new FastStorage(
            ['/foo/bar?index=1' => 'Hello in Memory!'],
            new SlowStorage()
        );
    }

    public function testCanRequestKeyInFastStorage()
    {
        $request = $this->createMock(RequestInterface::class);
        $request->method('getPath')->willReturn('/foo/bar');
        $request->method('getQuery')->willReturn('index=1');

        $this->assertSame('Hello in Memory!', $this->chain->handle($request));
    }

    public function testCanRequestKeyInSlowStorage()
    {
        $request = $this->createMock(RequestInterface::class);
        $request->method('getPath')->willReturn('/foo/baz');
        $request->method('getQuery')->willReturn('index=1');

        $this->assertSame('Hello, World!', $this->chain->handle($request));
    }

    public function testMiddlewares()
    {
        $server = new Server();
        $server->register("admin@example.com", "admin_pass");
        $server->register("user@example.com", "user_pass");

        $middleware = new ThrottlingMiddleware(3);
        $middleware
            ->linkWith(new UserExistsMiddleware($server))
            ->linkWith(new RoleCheckMiddleware());

        $server->setMiddleware($middleware);
        $result = $server->logIn("admin@example.com", "admin_pass");

        $this->assertEquals(true, $result);
    }
}
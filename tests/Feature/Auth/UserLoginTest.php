<?php

namespace Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hydrateUser();

        session(['_token' => 'test']);
    }

    public static function successfulLoginDataProvider(): array
    {
        return [
            'valid data' => [
                'data' => [
                    'email' => 'test@test.com',
                    'password' => 'password',
                ],
            ],
        ];
    }

    /**
     * @dataProvider successfulLoginDataProvider
     */
    public function test_successfulLoginWithValidData(array $data): void
    {
        $response = $this->withSession(['_token' => 'test'])->postJson('/api/login', $data);

        $response->assertStatus(Response::HTTP_OK);
        //        $response->assertJsonStructure(['token']);
    }

    public static function failedLoginDataProvider(): array
    {
        return [
            'missing email' => [
                'data' => [
                    'password' => 'password',
                ],
            ],
            'missing password' => [
                'data' => [
                    'email' => 'test@test.com',
                ],
            ],
        ];
    }

    /**
     * @dataProvider failedLoginDataProvider
     */
    public function test_failedLoginWithInvalidData(array $data): void
    {
        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function hydrateUser(): void
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => 'password',
        ]);
    }
}

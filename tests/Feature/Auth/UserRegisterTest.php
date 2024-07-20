<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    public static function successfulRegistrationDataProvider(): array
    {
        return [
            'valid data' => [
                'data' => [
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ],
            ],
        ];
    }

    /**
     * @dataProvider successfulRegistrationDataProvider
     */
    public function test_successfulRegistrationWithValidData(array $data): void
    {
        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        $this->assertTrue(Hash::check($data['password'], User::first()->password));
    }

    public static function failedRegistrationDataProvider(): array
    {
        return [
            'missing name' => [
                'data' => [
                    'email' => 'test@example.com',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ],
            ],
            'missing email' => [
                'data' => [
                    'name' => 'Test User',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ],
            ],
            'missing password' => [
                'data' => [
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'password_confirmation' => 'password',
                ],
            ],
            'passwords do not match' => [
                'data' => [
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'password' => 'password',
                    'password_confirmation' => 'different_password',
                ],
            ],
        ];
    }

    /**
     * @dataProvider failedRegistrationDataProvider
     */
    public function test_failedRegistrationWithMissingFields(array $data): void
    {
        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $this->assertDatabaseMissing('users', [
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
        ]);
    }
}

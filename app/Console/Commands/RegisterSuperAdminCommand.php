<?php

namespace App\Console\Commands;

use App\Rules\MatchOldPassword;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterSuperAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:super-admin
                           {--P|password : Whether only need to change password}';
    //Command will be called as php artisan register:super-admin

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Super Admin User';

    /**
     * @var string|null
     */
    private const FULL_NAME = 'Developer';

    /**
     * @var string|null
     */
    private const EMAIL = 'dev@dev.dev';

    /**
     * @var string|null
     */
    private ?string $oldPassword;

    /**
     * @var string|null
     */
    private ?string $password;

    /**
     * @var string|null
     */
    private ?string $passwordConfirmation;

    private $superUser;

    public function handle()
    {
        $this->setUser();

        $this->superUser->upsert([
            [
                'name' => self::FULL_NAME,
                'email' => self::EMAIL,
                'password' => Hash::make($this->password),
                'super_user' => true,
            ],
        ],
            ['email'], //unique attribute
            ['super_user', 'password'], //need to be change
        );

        if ($this->superUser->id) {
            return $this->info('Super User updated successfully!');
        }

        $this->display($this->superUser->firstWhere('super_user', true));
    }

    /**
     * Display created user in frame.
     *
     * @param Model $user
     */
    private function display(Model $user)
    {
        $headers = ['Name', 'Email'];
        $fields = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        $this->info('Super User created successfully!');
        $this->table($headers, [$fields]);
    }

    private function askOldPassword(): self
    {
        $this->oldPassword = $this->secret('Old password');
        $this->isValidOldPassword();

        return $this;
    }

    private function askPassword(): self
    {
        $this->password = $this->secret('New password');
        $this->passwordConfirmation = $this->secret('Confirm new password');
        $this->isValidPassword();

        return $this;
    }

    private function isValidOldPassword(): void
    {
        $validator = Validator::make([
            'old_password' => $this->oldPassword,
        ],
            [
                'old_password' => [
                    'required',
                    new MatchOldPassword($this->superUser),
                ],
            ]
        );

        if ($passwordErrors = $validator->errors()->first('old_password')) {
            $this->error($passwordErrors);
            $this->askOldPassword();
        }
    }

    private function isValidPassword(): void
    {
        $validator = Validator::make([
            'password' => $this->password,
            'password_confirmation' => $this->passwordConfirmation,
        ],
            [
                'password' => 'required|confirmed',
            ]
        );

        if ($passwordErrors = $validator->errors()->first('password')) {
            $this->error($passwordErrors);
            $this->askPassword();
        }
    }

    private function setUser()
    {
        $class = app()->getNamespace().'Models\Admin';
        $this->superUser = $class::firstWhere('super_user', true);

        if ($this->superUser &&
            ($this->option('password') ||
                $this->confirm('Superuser is already exist. Do you want to change the password?'))) {
            return $this->askOldPassword()->askPassword();
        }

        if (! $this->superUser &&
            (! $this->option('password') ||
                $this->confirm('Superuser is not created yet. Do you want to create?'))) {
            return $this->askPassword()->superUser = new $class;
        }

        $this->info('Ok, bye!');
        dd();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use App\System\Models\User;

class CreateAdminUser extends Migration
{
    protected $adminEmail = 'admin@mailforspam.com';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = $this->adminEmail;
		$user->password = 'funlib1234';
		$user->role = 'admin';
		$user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::where('email', $this->adminEmail)->first();
        if ($user instanceof User) {
            $user->delete();
        }
    }
}

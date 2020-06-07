<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestUserSeeder extends Seeder
{
	public function run()
	{
		$users = [
			[
				'firstname' => 'John',
				'lastname'  => 'Doe',
				'email'     => 'joe@example.com',
				'password'  => '',
				'token'     => '',
			],
			[
				'firstname' => 'Janet',
				'lastname'  => 'Doe',
				'email'     => 'janet@example.com',
				'password'  => '',
				'token'     => '',
			],
		];

		$builder = $this->db->table('users');

		foreach ($users as $user)
		{
			$builder->insert($user);
		}
	}
}

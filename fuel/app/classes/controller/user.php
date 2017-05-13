<?php

class Controller_User extends Controller_Hybrid {

	public function action_index() 
	{
		$data['users'] = Model_User::find('all');
		foreach ($data['users'] as $key => $user)
		{
			$data['users'][$key]['full_name'] = $user
		}
		$data['message'] = 'aaa';
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);
	}

	public function action_view($id = null) 
	{
		is_null($id) and Response::redirect('user');

		if (!$data['user'] = Model_User::find($id)) {
			Session::set_flash('error', 'Could not find user #' . $id);
			Response::redirect('user');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);
	}

	public function post_create() {
		//var_dump(Input::json());
		//return $this->response(Input::json());
		//return;

		$val = Model_User::validate('create');

		if ($val->run(Input::json())) {
			
			Auth::create_user(
				Input::json('username'),
				Input::json('password'),
				Input::json('username').'@example.org',
				1,
				array(
					'full_name' => Input::json('full_name'),
				)
			);
			
			return $this->response(array(
				'success' => true,
			));
		} else {
			//var_dump($val->error());
			return $this->response(array(
				'error' => $val->error_message()
			));
			//Session::set_flash('error', $val->error());
		}
	}

	public function get_create() {
		if (Input::method() == 'POST') {
			$val = Model_User::validate('create');

			if ($val->run()) {
				$user = Model_User::forge(array(
							'username' => Input::post('username'),
							'password' => Input::post('password'),
				));

				if ($user and $user->save()) {
					Session::set_flash('success', 'Added user #' . $user->id . '.');

					Response::redirect('user');
				} else {
					Session::set_flash('error', 'Could not save user.');
				}
			} else {
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');
	}

	public function action_edit($id = null) {
		is_null($id) and Response::redirect('user');

		if (!$user = Model_User::find($id)) {
			Session::set_flash('error', 'Could not find user #' . $id);
			Response::redirect('user');
		}

		$val = Model_User::validate('edit');

		if ($val->run()) {
			$user->username = Input::post('username');
			$user->password = Input::post('password');

			if ($user->save()) {
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('user');
			} else {
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		} else {
			if (Input::method() == 'POST') {
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');
	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('user');

		if ($user = Model_User::find($id)) {
			$user->delete();

			Session::set_flash('success', 'Deleted user #' . $id);
		} else {
			Session::set_flash('error', 'Could not delete user #' . $id);
		}

		Response::redirect('user');
	}

}

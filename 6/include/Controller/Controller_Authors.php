<?
class Controller_Authors {
	
	public static function run() {
		
		Engine::set_dft('title', 'Авторы');
		
		if (!isset($_REQUEST['oper'])) {
			// Список
			$dft['items'] = Model_Author::getItems();
			Engine::set_dft('content', Engine::renderView('Authors', $dft));
		} else {
			$oper = $_REQUEST['oper'];
			switch ($oper) {
				case 'add':
					self::add();
					break;
				case 'edit':
					$id = (isset($_REQUEST['id'])) ? intval($_REQUEST['id']) : 0;
					if (!$id) {
						Engine::set_flagShow404();
					} else {
						self::edit($id);
					}
					break;
				case 'remove':
					$id = (isset($_REQUEST['id'])) ? intval($_REQUEST['id']) : 0;
					if (!$id) {
						Engine::set_flagShow404();
					} else {
						Model_Author::remove($id);
						Engine::redirect('?page=authors');
					}
					break;
				default:
					Engine::set_flagShow404();
			} //
		} //
		
	} // function
	
	private static function add() {
		$href_edit = '?page=authors&oper=edit&id=';
		
		$msg = array();
		$formFields = self::formFields_getDefaults();
		
		// submit?
		if (isset($_REQUEST['submit'])) {
				// fill from request
			$formFields = Engine_Misc::getFromRequest_formFields($formFields);
				// validate
			$res = self::validate($formFields);
			// valid?
			if ($res['error']) {
				$msg = $res['errorMsg'];
			} else {
				// save
				$id = Model_Author::save($formFields);
				// redirect
				$href_edit .= $id;
				Engine::redirect($href_edit);
			}
		} //
		
		$dft['id'] = 0;
		$dft['formFields'] = $formFields;
		$dft['msg'] = $msg;
		//$dft['authors'] = AdminModel_Log::formFields_getLevelTitles();
		
		Engine::set_dft('content', Engine::renderView('Authors_Form', $dft));
	} // function

	private static function edit($id) {
		$msg = array();
		$formFields = self::formFields_getDefaults();
		
			// find
		$item = Model_Author::getItem($id);
		if (!$item) {
			Engine::set_flagShow404();
			return;
		}
		
		// submit?
		if (isset($_REQUEST['submit'])) {
				// fill from request
			$formFields = Engine_Misc::getFromRequest_formFields($formFields);
				// validate
			$res = self::validate($formFields);
			// valid?
			if ($res['error']) {
				$msg = $res['errorMsg'];
			} else {
					// save
				Model_Author::save($formFields, $id);
					// find
				$item = Model_Author::getItem($id);
					if (!$item) throw new Exception(__LINE__);
					// fill from item
				$formFields = Engine_Misc::fill_formFields($formFields, $item);
					if (!$formFields) throw new Exception(__LINE__);
			}
		} else {
				// fill from item
			$formFields = Engine_Misc::fill_formFields($formFields, $item);
				if (!$formFields) throw new Exception(__LINE__);
		} //
		
		$dft['id'] = $id;
		$dft['formFields'] = $formFields;
		$dft['msg'] = $msg;
		//$dft['levelTitles'] = AdminModel_Log::formFields_getLevelTitles();
		
		Engine::set_dft('content', Engine::renderView('Authors_Form', $dft));
	} // function
	
	private static function formFields_getDefaults() {
		$formFields = array(
			'name' => '',
			);
			
		return $formFields;
	} // function
	
	private static function validate($formFields) {
		$result = array(
			'error' => false,
			'errorMsg' => array(),
			);
		
		if (!strlen( $formFields['name'] )) {
			$result['errorMsg'][] = 'Не заполнено поле "ФИО автора"';
		}
		
		if ($result['errorMsg']) {
			$result['error'] = true;
		}
		
		return $result;
	} // function

} // class
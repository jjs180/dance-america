<?php
namespace Registration\Form;

use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class RegistrationStatusForm extends \NovumWare\Zend\Form\Form
{
	protected function initForm() {
		$status = new Element\Text('status');

		$this	->add($status);
	}

	/**
	 * @return InputFilterInterface
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {

			$status	= new Input('status');
			$status	->setRequired(true);

			$inputFilter = new InputFilter();
			$inputFilter	->add($status);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}


}
<?php
namespace Venues\Form;

use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class SearchVenuesForm extends \NovumWare\Zend\Form\Form
{
	protected function initForm() {
		$searchParam = new Element\Text('search_param');
		$searchCriteria = new Element\Text('search_criteria');
		$eventId = new Element\Text('event_id');

		$this	->add($searchParam)
				->add($searchCriteria)
				->add($eventId);
	}

	/**
	 * @return InputFilterInterface
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {

			$searchParam	= new Input('search_param');
			$searchParam	->setRequired(true);

			$searchCriteria	= new Input('search_criteria');
			$searchCriteria	->setRequired(true);

			$eventId	= new Input('event_id');
			$eventId	->setRequired(false);
			$eventId	->setAllowEmpty(true);

			$inputFilter = new InputFilter();
			$inputFilter	->add($searchParam)
							->add($searchCriteria)
							->add($eventId);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
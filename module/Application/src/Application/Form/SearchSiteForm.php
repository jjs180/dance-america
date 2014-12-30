<?php
namespace Application\Form;

use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class SearchSiteForm extends \NovumWare\Zend\Form\Form
{
	protected function initForm() {
		$searchParam = new Element\Text('search_param');
		$radius = new Element\Text('radius');
		$city = new Element\Text('city');
		$state = new Element\Text('state');
		$postalCode = new Element\Text('postal_code');

		$this	->add($searchParam)
				->add($radius)
				->add($city)
				->add($state)
				->add($postalCode);
	}

	/**
	 * @return InputFilterInterface
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {

			$searchParam	= new Input('search_param');
			$searchParam	->setAllowEmpty(false);
			$searchParam	->setRequired(true);

			$radius = new Input('radius');
			$radius ->setAllowEmpty(true);
			$radius	->setRequired(false);

			$city = new Input('city');
			$city	->setAllowEmpty(true);
			$city	->setRequired(false);

			$state = new Input('state');
			$state	->setAllowEmpty(true);
			$state	->setRequired(false);

			$postalCode = new Input('postal_code');
			$postalCode	->setAllowEmpty(true);
			$postalCode	->setRequired(false);
//			$contactEmail = new Input('contact_email');
//			$contactEmail	->setRequired(false);
//			$contactEmail	->setAllowEmpty(true)
//							->getValidatorChain()
//							->addValidator(new \Zend\Validator\EmailAddress());

			$inputFilter = new InputFilter();
			$inputFilter	->add($searchParam)
							->add($radius)
							->add($city)
							->add($state)
							->add($postalCode);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
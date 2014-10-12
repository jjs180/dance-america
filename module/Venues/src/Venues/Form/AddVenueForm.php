<?php
namespace Venues\Form;

use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class AddVenueForm extends \NovumWare\Zend\Form\Form
{
	protected function initForm() {
		$name = new Element\Text('name');
		$address1 = new Element\Text('address_1');
		$address2 = new Element\Text('address_2');
		$city = new Element\Text('city');
		$state = new Element\Text('state');
		$country = new Element\Text('country');
		$postalCode = new Element\Text('postal_code');
		$url = new Element\Url('url');
		$specialNotes = new Element\Text('special_notes');
		$description = new Element\Text('description');
		$contactEmail = new Element\Email('contact_email');
		$type = new Element\Text('type');
		$minimumAge = new Element\Text('minimum_age');

		$this
				->add($name)
				->add($address1)
				->add($address2)
				->add($city)
				->add($state)
				->add($country)
				->add($postalCode)
				->add($url)
				->add($specialNotes)
				->add($description)
				->add($contactEmail)
				->add($type)
				->add($minimumAge);
	}

	/**
	 * @return InputFilterInterface
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {

			$name	= new Input('name');
			$name	->setRequired(true);

			$address1	= new Input('address_1');
			$address1	->setRequired(true);

			$address2	= new Input('address_2');
			$address2	->setAllowEmpty(true);
			$address2	->setRequired(false);

			$city	= new Input('city');
			$city	->setRequired(true);

			$state	= new Input('state');
			$state	->setRequired(false);
			$state	->setAllowEmpty(true);

			$country	= new Input('country');
			$country	->setRequired(true);

			$postalCode	= new Input('postal_code');
			$postalCode	->setRequired(false);
			$postalCode ->setAllowEmpty(true);

			$url	= new Input('url');
			$url	->setAllowEmpty(true);
			$url	->setRequired(false);

			$specialNotes = new Input('special_notes');
			$specialNotes	->setAllowEmpty(true);
			$specialNotes	->setRequired(false);

			$description = new Input('description');
			$description	->setAllowEmpty(true);
			$description	->setRequired(false);

			$contactEmail = new Input('contact_email');
			$contactEmail	->setAllowEmpty(true);
			$contactEmail	->setRequired(false)
							->getValidatorChain()
							->addValidator(new \Zend\Validator\EmailAddress());

			$type = new Input('type');
			$type	->setRequired(true);

			$minimumAge = new Input('minimum_age');
			$minimumAge	->setRequired(true);

			$inputFilter = new InputFilter();
			$inputFilter->add($name)
						->add($address1)
						->add($address2)
						->add($city)
						->add($state)
						->add($country)
						->add($postalCode)
						->add($url)
						->add($specialNotes)
						->add($description)
						->add($contactEmail)
						->add($type)
						->add($minimumAge);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
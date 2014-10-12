<?php
namespace Events\Form;

use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class AddEventForm extends \NovumWare\Zend\Form\Form
{
	protected function initForm() {
		$name = new Element\Text('name');
		$venueId = new Element\Text('venue_id');
		$url = new Element\Url('url');
		$startTime = new Element\Time('start_time');
		$endTime = new Element\Time('end_time');
		$startDate = new Element\Date('start_date');
		$endDate = new Element\Date('end_date');
		$willStop = new Element\Text('will_stop');
		$repetitions = new Element\Text('repetitions');
		$specialNotes = new Element\Text('special_notes');
		$description = new Element\Text('description');
		$costs = new Element\Text('costs');
		$contactEmail = new Element\Email('contact_email');
		$minimumAge = new Element\Text('minimum_age');

		$this	->add($name)
				->add($venueId)
				->add($url)
				->add($startTime)
				->add($endTime)
				->add($startDate)
				->add($endDate)
				->add($willStop)
				->add($repetitions)
				->add($specialNotes)
				->add($description)
				->add($costs)
				->add($contactEmail)
				->add($minimumAge);
	}

	/**
	 * @return InputFilterInterface
	 */
	public function getInputFilter() {
		if (!$this->inputFilter) {

			$name	= new Input('name');
			$name	->setAllowEmpty(true);
			$name	->setRequired(false);

			$venueId = new Input('venue_id');
			$venueId	->setRequired(true);

			$url = new Input('url');
			$url	->setAllowEmpty(true);
			$url	->setRequired(false);

			$startTime = new Input('start_time');
			$startTime	->setRequired(true);

			$endTime = new Input('end_time');
			$endTime	->setRequired(true);

			$startDate = new Input('start_date');
			$startDate	->setAllowEmpty(false);
			$startDate	->setRequired(true);

			$endDate = new Input('end_date');
			$endDate	->setRequired(true);
			$endDate	->allowEmpty(false);

			$willStop = new Input('will_stop');
			$willStop	->setRequired(true);

			$repetitions = new Input('repetitions');
			$repetitions  ->setAllowEmpty(true);
			$repetitions	->setRequired(false);

			$specialNotes = new Input('special_notes');
			$specialNotes	->setAllowEmpty(true);
			$specialNotes	->setRequired(false);

			$description = new Input('description');
			$description	->setAllowEmpty(true);
			$description	->setRequired(false);

			$costs = new Input('costs');
			$costs	->setAllowEmpty(true);
			$costs	->setRequired(false);

			$contactEmail = new Input('contact_email');
			$contactEmail	->setRequired(false);
			$contactEmail	->setAllowEmpty(true)
							->getValidatorChain()
							->addValidator(new \Zend\Validator\EmailAddress());

			$minimumAge = new Input('minimum_age');
			$minimumAge	->setRequired(true);

			$inputFilter = new InputFilter();
			$inputFilter	->add($name)
							->add($url)
							->add($venueId)
							->add($startTime)
							->add($endTime)
							->add($startDate)
							->add($endDate)
							->add($willStop)
							->add($repetitions)
							->add($specialNotes)
							->add($description)
							->add($costs)
							->add($contactEmail)
							->add($minimumAge);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
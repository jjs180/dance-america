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
		$type = new Element\Text('type');
		$url = new Element\Url('url');
		$startTime = new Element\Time('start_time');
		$endTime = new Element\Time('end_time');
		$startDate = new Element\Date('start_date');
		$endDate = new Element\Date('end_date');
		$minimumAge = new Element\Text('minimum_age');
		$willStop = new Element\Text('will_stop');
		$repetitions = new Element\Text('repetitions');
		$description = new Element\Text('description');
		$specialNotes = new Element\Text('special_notes');
		$costs = new Element\Text('costs');
		$contactEmail = new Element\Email('contact_email');

		$this	->add($name)
				->add($venueId)
				->add($type)
				->add($url)
				->add($startTime)
				->add($endTime)
				->add($startDate)
				->add($endDate)
				->add($minimumAge)
				->add($willStop)
				->add($repetitions)
				->add($description)
				->add($specialNotes)
				->add($costs)
				->add($contactEmail);
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

			$type = new Input('type');
			$type	->setRequired(true);
			$type  ->allowEmpty(false);

			$url = new Input('url');
			$url	->setAllowEmpty(true);
			$url	->setRequired(false);

			$startTime = new Input('start_time');
			$startTime	->setRequired(true);
			$startTime  ->allowEmpty(false);

			$endTime = new Input('end_time');
			$endTime	->setRequired(true);
			$endTime	->allowEmpty(false);

			$startDate = new Input('start_date');
			$startDate	->setAllowEmpty(false);
			$startDate	->setRequired(true);

			$endDate = new Input('end_date');
			$endDate	->setRequired(true);
			$endDate	->allowEmpty(false);

			$minimumAge = new Input('minimum_age');
			$minimumAge	->setRequired(true);
			$minimumAge	->allowEmpty(false);

			$willStop = new Input('will_stop');
			$willStop	->setRequired(true);

			$repetitions = new Input('repetitions');
			$repetitions  ->setAllowEmpty(true);
			$repetitions	->setRequired(false);

			$description = new Input('description');
			$description	->setAllowEmpty(true);
			$description	->setRequired(false);

			$specialNotes = new Input('special_notes');
			$specialNotes	->setAllowEmpty(true);
			$specialNotes	->setRequired(false);

			$costs = new Input('costs');
			$costs	->setAllowEmpty(true);
			$costs	->setRequired(false);

			$contactEmail = new Input('contact_email');
			$contactEmail	->setRequired(false);
			$contactEmail	->setAllowEmpty(true)
							->getValidatorChain()
							->addValidator(new \Zend\Validator\EmailAddress());

			$inputFilter = new InputFilter();
			$inputFilter	->add($name)
							->add($type)
							->add($url)
							->add($venueId)
							->add($startTime)
							->add($endTime)
							->add($startDate)
							->add($endDate)
							->add($willStop)
							->add($minimumAge)
							->add($repetitions)
							->add($specialNotes)
							->add($description)
							->add($costs)
							->add($contactEmail);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
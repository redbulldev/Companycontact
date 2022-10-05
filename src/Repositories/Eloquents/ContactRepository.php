<?php

namespace Companycontact\Repositories\Eloquents;

use Companycontact\Repositories\Contracts\ContactRepositoryInterface;
use Companybase\Repositories\Eloquents\AbstractRepository;
use Companycontact\Models\Contact;

class ContactRepository extends AbstractRepository implements ContactRepositoryInterface
{
	protected $contact;

	function __construct(Contact $contact)
	{
		$this->contact = $contact;

		parent::__construct($contact);
	}

}

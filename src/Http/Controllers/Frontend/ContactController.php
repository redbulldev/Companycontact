<?php

declare(strict_types=1);

namespace Companycontact\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Companycontact\Repositories\Contracts\ContactRepositoryInterface;
use Companycontact\Http\Requests\ContactRequest;
use Exception;
use Log;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->middleware('web');

        $this->contact = $contact;
    }

    public function sendContact()
    {
        return view('companybase::frontend.contact.index');
    }

    public function contactStore(ContactRequest $request)
    {
        try {
            $this->contact->store($request->validated());

            return redirect()->back()->withInput($request->input())->with('message', 'Giử liên hệ thành công');
        } catch (Exception $exception) {
            Log::error('error(loi):'.$exception->getMessage().$exception->getLine());
        }
    }

}

<?php

declare(strict_types=1);

namespace Companycontact\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Companycontact\Repositories\Contracts\ContactRepositoryInterface;
use Companycontact\Http\Requests\ContactRequest;
use Log;
use Exception;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contact->all(['id', 'name', 'email', 'phone']);

        return view('companybase::admin.contact.index',compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $contact = $this->contact->show($id, ['id', 'name', 'email', 'phone', 'message']);

        return view('companybase::admin.contact.show',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $this->contact->delete($id);

            return redirect()->route('contact.index')->with('message','Xóa thành công');
        } catch (\Exception $e) {
            Log::error('error(loi):'.$e->getMessage().$e->getLine());
        }
    }
}

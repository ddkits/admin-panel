<?php

namespace Ddkits\Adminpanel\Controller;

use Ddkits\Adminpanel\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Artisan;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Contact model instance.
     *
     * @var Contact
     */
    private $contact_model;

    /**
     * Create a new controller instance.
     *
     * @param Contact $contact_model
     */
    public function __construct(Contact $contact_model)
    {
        /*
         * Model namespace
         * using $this->contact_model can also access $this->contact_model->where('id', 1)->get();
         * */
        $this->contact_model = $contact_model;

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (!Auth::user()->id == 1) {
            abort('401', '401');
        }

        $contacts = $this->contact_model->get();

        return view('adminpanel::admin.contact.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required|not_regex:[<\s*a[^>]*>(.*?)<\s*/\s*a>]',
            // 'subject' => 'required',
            // 'captchacode' => 'required|confirmed'
        ])->validate();

        $input = $request->all();
        $contact = $this->contact_model->create($input);

        return response()->json([
            'success'=>'Thank you for contacting us, we will get back to you as soon as possible.',
            'message'=>'Thank you for contacting us, we will get back to you as soon as possible.',
            'code'=>'201'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->id == 1) {
            abort('401', '401');
        }

        $contact = $this->contact_model->findOrFail($id);

        return view('adminpanel::admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id', $id)->delete();
        Session::flash('Success', 'Deleted!');
        return back();
    }
    public function submit(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required|not_regex:[<\s*a[^>]*>(.*?)<\s*/\s*a>]',
            // 'subject' => 'required',
            // 'captchacode' => 'required|confirmed'
        ])->validate();
        $input = $request->all();
        /*
          Add mail functionality here.
        */
        Contact::insert($input);
        return response()->json(null, 200);
    }
}

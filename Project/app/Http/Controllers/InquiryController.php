<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInquiryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Inquiry $inquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInquiryRequest  $request
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
    public function Inquiry()
    {
        return view('Inquiry.Inquiry');
    }

    public function Inquiryadd(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->id= $request->id;
        $inquiry->Name= $request->Name;
        $inquiry->Question= $request->Question;
        $inquiry->Answer= $request->Answer;
        $inquiry->save();
        //return redirect()->route('Inquiryindex');
    }
    public function Inquiryindex(Request $request)
    {
        $inquiries = Inquiry::all(); 
        $inquiries = Inquiry::paginate(3);
        return Inquiry::all();
        //return view('Inquiry.Inquiryindex')->with('inquiries', $inquiries);
    }
}


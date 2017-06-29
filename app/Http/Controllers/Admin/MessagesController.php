<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;
use App\Message;


class MessagesController extends Controller
{
    /**
     * Retrieves all messages, ordered by sent_date,
     * with pagination every 10 messages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msgs = Message::orderByDesc('sent_date')->paginate(10);

        return view('admin.messages.list', compact('msgs'));

    }

    /**
     * Creates a message entry in the db
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        Message::create($request->except(['_token']));

        return redirect()->route('messages.index');
    }

    /**
     * Gets all information from a message, at specified id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $msg = Message::findOrFail($id);

        return view('admin.messages.read', compact('msg'));
    }

    /**
     * Soft deletes a message, meaning putting it in a temporary bin
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function trash($id)
    {
        Message::where('id', $id)->delete();

        return redirect()->route('messages.index');

    }

    /**
     * Shows the bin with soft deleted messages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTrashed()
    {
        // shows all soft deleted messages
        // ordered by sent_date
        // with pagination every 10 messages
        $msgs = Message::onlyTrashed()->orderByDesc('sent_date')->paginate(10);

        return view('admin.messages.trashed', compact('msgs'));
    }


    /**
     * Permanently deletes message from the db
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($data = Message::withTrashed()->where('id', $id)->exists() !== false) {

            Message::withTrashed()->where('id', $id)->forceDelete();

        }

        return redirect()->route('messages.trashed');

    }

}


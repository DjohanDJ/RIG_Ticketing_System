<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\ReportHeader;
use App\Models\ReportMessage;
use Illuminate\Http\Request;

class BinusianController extends Controller
{
    public function getAllTicket()
    {
        /**
         * Nimnya nanti ambil dr session 
         * */
        $tickets = ReportHeader::where('nim', '2201712345')->get();
        $data = [
            'createdTickets' => $tickets
        ];
        return view('binusian.binusian-home', $data);
    }

    public function getInsertTicketPage()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('binusian.insert-ticket', $data);
    }

    public function insertTicket(Request $request)
    {
        // Nim ganti sesuai session
        ReportHeader::create([
            'categoryId' => $request->categoryName,
            'nim' => '2201712345',
            'status' => 'waiting',
            'title' => $request->title,
            'description' => $request->description
        ]);
        return redirect('binusian.binusian-home');
    }

    public function detailTicket(Request $request)
    {
        $selectedTicket = ReportHeader::where('id', $request->id)->first();
        $replies = ReportMessage::where('reportId', $request->id)->get();
        $messagesForParse = [];
        foreach ($replies as $reply) {
            $message = Message::where('id', $reply->messageId)->first();
            array_push($messagesForParse, $message);
        }
        $data = [
            'selectedTicket' => $selectedTicket,
            'replies' => $messagesForParse
        ];
        dd($data);
        return view('binusian.detail-ticket', $data);
    }

    public function replyTicket(Request $request)
    {
        //session nim
        $reply = $request->reply;
        $createdMessage = Message::create([
            'messageContent' => $reply,
            'messageSender' => '2201712345'
        ]);
        ReportMessage::create([
            'reportId' => $request->id,
            'messageId' => $createdMessage->id
        ]);
        return redirect('/detail-tickets/' . $request->id);
    }
}

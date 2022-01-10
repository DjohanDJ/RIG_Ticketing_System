<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Message;
use App\Models\ReportHeader;
use App\Models\ReportMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdminPage(Request $request)
    {
        $categories = Category::all();
        if ($request->categoryName == 'none' && $request->status == 'none') {
            $allTickets = ReportHeader::all();
        } else if ($request->categoryName != 'none' && $request->status == 'none') {
            $allTickets = ReportHeader::where('categoryId', $request->categoryName)->get();
        } else if ($request->categoryName == 'none' && $request->status != 'none') {
            $allTickets = ReportHeader::where('status', $request->status)->get();
        } else {
            $allTickets = ReportHeader::where('categoryId', $request->categoryName)->where('status', $request->status)->get();
        }
        
        $currCategoryName;

        if($request->categoryName == 'none'){
            $currCategoryName = $request->categoryName;
        }else{
            $category = Category::where('id', $request->categoryName)->get();
            $currCategoryName = $category[0]->categoryName;
        }
        
        $currCategory = $request->categoryName;
        $currStatus = $request->status;

        $data = [
            'tickets' => $allTickets,
            'categories' => $categories,
            'cc' => $currCategory,
            'cs' => $currStatus,
            'ccName' => $currCategoryName
        ];
        return view('admin.admin-home', $data);
    }

    public function detailTicket(Request $request)
    {
        if ($request->status == 'waiting') {
            ReportHeader::where('id', $request->id)->update([
                'status' => 'on progress'
            ]);
        }
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
        // dd($data);
        return view('admin.progress-ticket', $data);
    }

    public function replyTicket(Request $request)
    {
        //session admin
        $reply = $request->reply;
        $createdMessage = Message::create([
            'messageContent' => $reply,
            'messageSender' => 'admin'
        ]);
        ReportMessage::create([
            'reportId' => $request->id,
            'messageId' => $createdMessage->id
        ]);
        return redirect('/detail-tickets/' . $request->id . '/on progress');
    }

    public function closeTicket(Request $request)
    {
        ReportHeader::where('id', $request->id)->update([
            'status' => 'closed'
        ]);
        return redirect('/admin-home/none/none');
    }
}

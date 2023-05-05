<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Feecontroller extends Controller
{
    public function index(){
        $students_ids = \App\Models\Student::where('parent_id', auth()->user()->id)->pluck('id');
        $Fee_invoices = \App\Models\Fee_invoice::whereIn('student_id',$students_ids)->get();
        return view('pages.parents.fees.index', compact('Fee_invoices'));
    }
}





// public function receiptStudent($id){

//     $student = Student::findorFail($id);
//     if ($student->parent_id !== auth()->user()->id) {
//         toastr()->error('يوجد خطا في كود الطالب');
//         return redirect()->route('sons.fees');
//     }

//     $receipt_students = ReceiptStudent::where('student_id',$id)->get();

//     if ($receipt_students->isEmpty()) {
//         toastr()->error('لا توجد مدفوعات لهذا الطالب');
//         return redirect()->route('sons.fees');
//     }
//     return view('pages.parents.Receipt.index', compact('receipt_students'));

// }

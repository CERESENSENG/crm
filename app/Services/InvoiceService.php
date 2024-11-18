<?php

namespace App\Services;

use App\Models\Invoice;

class invoiceService {





    function   get(int $id)
    {

       try {
        return  Invoice::find($id);
      } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

       }

    }


    function  store(array $invoice)
    {

       try {
        return  Invoice::create($invoice);
       } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }

}



    function  getByInvoiceNo(string $invoice_no)
    {

       try {
        return  Invoice::whereInvoice($invoice_no)->first();
       } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

       }
    }

    function  getByTxref(string $tx_ref)
    {

       try {
        return  Invoice::wheretxnRef($tx_ref)->first();
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }


    }

    function    updateStatusByInvoiceNo(string $invoice_no, int $status=0)
    {

       try {
             return   Invoice::whereInvoice($invoice_no)->update(['status'=>$status]);
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }

    }


    function    updateStatus(int $id, int $status=0)
    {

       try {
             return   (Invoice::find($id))->update(['status'=>$status]);
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

      }


    }


}

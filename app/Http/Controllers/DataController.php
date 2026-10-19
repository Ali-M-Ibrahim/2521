<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class DataController extends Controller
{
    public function getAll()
    {
        // select * from customers;
        $data = Customer::all();

        return $data;
    }

    public function getById($id)
    {
        // SELECT * FROM CUSTOMERS WHERE ID=?;
        // $data = Customer::find($id);
        // if (! $data) {
        //     abort(404);
        // }
        $data = Customer::findOrFail($id);
        // $data = Customer::findOr($id, function () {
        //     return 'Customer not found';
        // });

        return $data;
    }

    public function getByCondition()
    {
        // select * from customers where salary = 100;
        // when you use get, it will return array
        // $data = Customer::where('salary', 100)->get();

        // if you want to return first occurence
        // $data = Customer::where('salary', 100)->first();
        // $data = Customer::where('salary', 500)->firstOrfail();
        // $data = Customer::where('salary', 500)->firstOr(function () {
        //     return 'not found';
        // });

        // where function takes 2 or 3 parameters
        // when you input 2 parameters, the operator is considered =
        // if you want to changed operator, pass 3 parameters

        // $data = Customer::where('salary', '>=', 100)->get();
        // $data = Customer::where('salary', '<=', 100)->get();
        $data = Customer::where('salary', '!=', 100)->get();

        return $data;
    }

    public function getByMultipleConditions()
    {
        // select * from customers where id > 1 and salary >50;
        $data = Customer::where('id', '>', 1)
            ->where('salary', '>', 50)
            ->get();

        return $data;
    }

    public function getUsingLike()
    {
        // SELECT * FROM CUSTOMERS WHERE NAME LIKE '%A%';
        $data = Customer::where('name', 'like', '%a%')->get();

        return $data;
    }

    public function getConditionOr()
    {
        // select * from customers where id > 2 or salary > 50;
        $data = Customer::where('id', '>', 2)
            ->OrWhere('salary', '>', 50)->get();

        return $data;
    }

    public function getIn()
    {
        // select * from cusotomers where id in (1,2,3)
        $data = Customer::whereIn('id', [1, 2, 3])->get();

        return $data;
    }

    public function getNotIn()
    {
        // select * from cusotomers where id in (1,2,3)
        $data = Customer::whereNotIn('id', [1, 2, 3])->get();

        return $data;
    }

    public function getBetween()
    {
        // select * from customers where salary between 100 and 200;
        $data = Customer::whereBetween('salary', [100, 300])->get();

        return $data;
    }

    public function getSpecificAttributes()
    {
        // select name, salary from customers;
        $data = Customer::select(['name', 'salary'])
            ->where('id', '>', 2)
            ->get();

        return $data;
    }

    public function getDistinct()
    {
        // select distinct salary from customers;
        $data = Customer::select('salary')->distinct()->get();

        return $data;

    }

    public function ordering()
    {
        $data = Customer::where('salary', '>', 50)
            ->orderBy('salary', 'asc')
            ->get();

        $data = Customer::where('salary', '>', 50)
            ->orderBy('salary', 'desc')
            ->get();

        return $data;
    }

    public function Arithmetic()
    {
        // select count(1) from csutomers;
        $data = Customer::count();
        // select sum(salary) from customers;
        $data = Customer::sum('salary');
        // select avg(salary) from customers;
        $data = Customer::avg('salary');

        // select max(salary) from customers;
        $data = Customer::max('salary');

        // select min(salary) from customers;
        $data = Customer::min('salary');

        return $data;
    }

    public function getPluck()
    {
        $data = Customer::select('id')->get();
        $data = Customer::pluck('id');

        return $data;
    }

    public function getLatst()
    {
        // select * from customers order by created at desc;
        $data = Customer::latest()->get();

        return $data;
    }

    public function groupBy()
    {
        $data = Customer::all()->groupBy('salary');

        return $data;
    }

    public function join()
    {
        $data = Customer::join('credentials', 'customers.id', 'credentials.customer_id')
            ->select(['customers.name', 'credentials.email'])
            ->get();

        return $data;
    }

    public function relation()
    {
        // by default, laravel use lazy relation
        // $data = Customer::find(1);
        // select credentials.* from credentials join customers on credentials.customer_id = customer.sid
        // $relatedCredentials = $data->getCredentials;
        // $relatedAccounts = $data->getAccounts;

        // we can use eager
        // $data = Customer::with(['getCredentials', 'getAccounts'])->find(1);

        // 1 query to get all customers
        $customers = Customer::all();
        // loop on 4 customers, 4 qurey so total = 5;
        // foreach ($customers as $obj) {
        //     $obj->getAccounts;
        // }

        // $customers = Customer::with('getAccounts')->get();

        $customers = Customer::has('getAccounts')->get();
        $customers = Customer::doesntHave('getAccounts')->get();

        // to get customer who have account having iban =123
        $data = Customer::whereHas('getAccounts', function ($q) {
            $q->where('iban', 123);
        })->get();

        return $data;
    }
}

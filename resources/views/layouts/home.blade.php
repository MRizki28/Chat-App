@extends('Base.header')
@section('content')
    <div class="max-w-5xl mx-auto mt-5">
        <div class="relative overflow-x-auto border">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table">
                <thead class="text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400 border">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
    </div>
@endsection

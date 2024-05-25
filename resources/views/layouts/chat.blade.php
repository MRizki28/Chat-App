@extends('Base.header')
@section('content')
    <!-- component -->
    <div class="">
        <div class="bg-gray-100 h-screen flex flex-col max-w-lg mx-auto">
            <div class="bg-blue-500 p-4 text-white flex justify-between items-center">
                <span class="text-start" id="receiver"></span>
                <div class="relative inline-block text-left">
                    <button  class="hover:bg-blue-400 rounded-md p-1" id="logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                <div class="flex flex-col space-y-2" id="messageContainer">

                </div>
            </div>

            <div class="bg-white p-4 flex items-center">
                <input type="text" id="messageInput" placeholder="Type your message..."
                    class="flex-1 border rounded-full px-4 py-2 focus:outline-none">
                <button onclick="sendMessage()"
                    class="bg-blue-500 text-white rounded-full p-2 ml-2 hover:bg-blue-600 focus:outline-none">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>

        </div>
    </div>

@endsection

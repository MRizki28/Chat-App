import axios from 'axios';
import $ from 'jquery'
import moment from 'moment';

$(document).ready(function () {
    let url = new URL(window.location.href);
    let id_penerima = url.href.split("/")[4];
    let currentUserId = localStorage.getItem('id_user');

    const getAllChat = async () => {
        const response = await axios.get(`/v1/message/get/${id_penerima}`)
        const responseData = response.data
        const receiverName = $("#receiver")
        const receiver = localStorage.getItem("receiver_name");
        receiverName.text(receiver);
        $('#messageContainer').empty();
    
        $.each(responseData.messages, function (index, message) {
            let formattedDate = moment(message.created_at).format('h:mm:ss a');
            let messageHtml = `
                <div class="flex ${message.id_sender.id == currentUserId ? 'justify-end' : ''}">
                    <div class=" text-black p-2 rounded-lg max-w-xs ${message.id_sender.id == currentUserId ? 'bg-blue-200' : 'bg-gray-300'}">
                        ${message.message}
                    </div>
                </div>
                <div class="flex ${message.id_sender.id == currentUserId ? 'justify-end' : ''}">
                    <span>
                            ${formattedDate}
                        </span>
                    </div>
            `;
            $('#messageContainer').append(messageHtml);
        });
    }

    getAllChat();
    window.Echo.channel('chat.' + id_penerima)
        .listen('.message.sent', (data) => {
            getAllChat();
        });

    window.sendMessage = async function () {
        try {
            const formData = new FormData();
            const messageInput = document.getElementById('messageInput');
            formData.append('message', messageInput.value);
            formData.append('id_receiver', id_penerima);

            const response = await axios.post('/v1/message/send', formData);
            messageInput.value = '';
            getAllChat();
            console.log('pesan terkirim');
        } catch (error) {
            console.log(error);
        }
    };
});

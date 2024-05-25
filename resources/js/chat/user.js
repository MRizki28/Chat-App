import axios from "axios";
import $ from 'jquery'

$(document).ready(function () {
    getAllData()
});

const getAllData = async () => {
    try {
        $("#table tbody").empty();

        const response = await axios.get("/v1/user")
        const responseData = response.data

        let tableBody = ""

        $.each(responseData.data, function (item, value) {
            tableBody += "<tr class='bg-white dark:bg-gray-800'>"
            tableBody += "<td>" + value.name + "</td>"
            tableBody += "<td class='font-bold hover:underline'>" +
                "<a href='chat/" + value.id + "' class='btn btn-sm edit-modal mr-1' data-name='" + value.name + "'>Chat</a>" +
                "</td>"
            tableBody += "</tr>"
        });
        

        $("table tbody").on("click", "a[data-name]", function() {
            let receiverName = $(this).data("name");
            localStorage.setItem("receiver_name", receiverName);
        });
        
        $("table tbody").append(tableBody)
    } catch (error) {
        console.log(error);
    };
}

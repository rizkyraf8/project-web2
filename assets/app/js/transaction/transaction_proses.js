function changeStatus(lineId, qty, request) {
    var selectStatus = document.getElementById("statusBarang[" + lineId + "]");
    
    if (qty.value > request) {
        document.getElementById('qty[' + lineId + ']').value = request; 
        selectStatus.value = "t";
    }else if (qty.value == 0) {
        selectStatus.value = "c";
    }else if (qty.value == request) {
        selectStatus.value = "t";
    }else {
        selectStatus.value = "h";
    }
}

function changeSelectStatus(lineId, status, request) {
    var selectStatus = document.getElementById("qty[" + lineId + "]");
    if(status == "c"){
        selectStatus.value = "0";
    }else if(status == "t"){
        selectStatus.value = request;
    }else if(status == "h"){
        selectStatus.value = Math.round(request / 2);
    }else if(status == "f"){
        selectStatus.value = 0;
    }
}
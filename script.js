add_btn = document.getElementById("add-btn");


add_btn.addEventListener("click", function () {
    var title = document.querySelector("#title").value;
    var author = document.querySelector("#author").value;
    var isbn = document.querySelector("#isbn").value;
    var qty = document.querySelector("#quantity").value;
    var img = document.querySelector("#image").value;

    if (title == "" || author == "" || isbn == "" || qty == "" || img == "") {
        alert("les champs sont obligatoires");
        console.log("les champs sont obligatoires");
    } else {
        ajouter();
    }
}
);

function ajouter() {
    let tbody = document.getElementsByTagName("tbody")[0];
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var isbn = document.getElementById("isbn").value;
    var qty = document.getElementById("quantity").value;
    var img = document.getElementById("image").value;
    var rowCount = tbody.rows.length;

    var trx = document.createElement("tr");
    var tdx1 = document.createElement("td");
    var tdx2 = document.createElement("td");
    var tdx3 = document.createElement("td");
    var tdx4 = document.createElement("td");
    var tdx5 = document.createElement("td");
    var tdx6 = document.createElement("td");

    var xbtn = document.createElement("button");
    xbtn.id = "delete-" + rowCount;
    xbtn.className = "btn btn-danger";
    xbtn.title = "remove";
    xbtn.innerHTML = "x";
    xbtn.onclick = function () {
        this.closest("tr").remove();
    };

    tdx1.innerHTML = title;
    trx.appendChild(tdx1);

    tdx2.innerHTML = author;
    trx.appendChild(tdx2);

    tdx3.innerHTML = isbn;
    trx.appendChild(tdx3);

    tdx4.innerHTML = qty;
    trx.appendChild(tdx4);

    tdx5.innerHTML = img;
    trx.appendChild(tdx5);

    tdx6.appendChild(xbtn);
    trx.appendChild(tdx6);

    tbody.appendChild(trx);
}


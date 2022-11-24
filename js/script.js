document.getElementById("order").addEventListener("change", function(){
    let order = this.value;
    location.href = "?order=" + order;
});

let order = location.search.split("=")[1];
if (order) {
    document.getElementById("order").value = order;
}

// een nieuwe datum aanmaken en die in het juiste formaat zetten
// De datum word in de new item fields gezet zodat deze standaard niet leeg zijn
document.querySelectorAll(".date").forEach(element => {
    element.value = new Date().toISOString().slice(0, 10);
});


function deleteItem(id) {
    fetch(`delete.php?ID=${id}`,{
    }).then(res => {
      checkResponse(res, document.location.reload());
  });
}

function updateItem(id) {
  const item = document.getElementById(`item-${id}`);

  console.log(item.querySelector(".prio").value);

  const titel = item.querySelector(".itemTitel").innerHTML;
  const omschrijving = item.querySelector(".itemText").innerHTML;
  const itemBD = item.querySelector(".itemBD").value;
  const itemED = item.querySelector(".itemED").value;
  const prioriteit = item.querySelector(".prio").value;
  const itemStatus = item.querySelector(".status").value;

  fetch(`update.php`, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
      ID: id,
      titel: titel,
      inhoud: omschrijving,
      itemBD: itemBD,
      itemED: itemED,
      prio: prioriteit,
      status: itemStatus,
    }),
  }).then((res) => {
    checkResponse(res, document.location.reload());
  });
}

function checkResponse(res, action) {
    if (res.status === 200) {
        action;
    } else if(res.status === 401) {
        document.location.reload();
    } else {
        alert(res.statusText);
    }
}
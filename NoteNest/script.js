// Initialize DataTables
let table = $("#myTable").DataTable();

// Edit Button Events
edits = document.getElementsByClassName("edit");

Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit ");

    tr = e.target.parentNode.parentNode;
    title = tr.getElementsByTagName("td")[0].innerText;
    description = tr.getElementsByTagName("td")[1].innerText;
    console.log(title, description);

    titleEdit.value = title;
    descriptionEdit.value = description;
    snoEdit.value = e.target.id;
    console.log(e.target.id);

    $("#editModal").modal("toggle");
  });
});

// Delete Button Events
deletes = document.getElementsByClassName("delete");

Array.from(deletes).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit ");

    sno = e.target.id.substr(1);

    if (confirm("Please Confirm to Delete this Note!")) {
      console.log("yes");
      window.location = `/NoteNest/index.php?delete=${sno}`;
    } else {
      console.log("no");
    }
  });
});
